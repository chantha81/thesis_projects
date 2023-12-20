<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\Models\Booked_Package;
use App\Models\Room;
use App\Models\Tent;
use App\Models\BookingDetail;
use App\Models\TentDetail;
use App\Models\Accessories;
use App\Models\CustomerInfomation;
use App\Models\PlaceCamping;
use App\Models\PlaceCampingDetail;

use Session;
use DataTables;
use Carbon\Carbon;

class BookingController extends Controller

{
    // function __construct()
    // {
    //      $this->middleware('permission:booking-list|booking-create|booking-edit|booking-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:booking-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:booking-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:booking-delete', ['only' => ['destroy']]);
    // }
    public function index(Request $request)
    {
        // $data = DB::table('booked__packages')
        //         ->leftJoin( 'customer_infomations', 'customer_infomations.id','=', 'booked__packages.customer_info_id' )
        //         ->select( 'customer_infomations.*','booked__packages.*')
        //         ->selectRaw('booked__packages.total_price - booked__packages.book_advance as balance')
        //         ->orderByDesc('booked__packages.created_at')
        //         ->get();
        // dd($data);

        
        if(request()->ajax()) {
            $data = DB::table('booked__packages')
                ->leftJoin( 'customer_infomations', 'customer_infomations.id','=', 'booked__packages.customer_info_id' )
                ->select( 'customer_infomations.*','booked__packages.*')
                ->selectRaw('booked__packages.total_price - booked__packages.book_advance as balance')
                ->orderByDesc('booked__packages.created_at') 
                ->get();
            return DataTables::of($data)
            ->addColumn('action', 'booking.actions')
            ->make(true);
            // ->toJson();      
        }
        
        return view('booking.index');
    }
    public function create()
    {
        // $arr_room = Room::all();
        $rooms = array();
    	foreach (Room::all() as $room) {
    		$rooms = $room->all();
    	}
        $tents = Tent::all();
        return view('booking.create',['tents'=>$tents])->with('rooms', $rooms);
    }
    public function getRoomByID()
    {
        $room_id = request()->query('room');
        $ids = (explode(",",$room_id));
        $rooms = DB::table('rooms')
            ->leftjoin('room_type','rooms.room_type_id','room_type.id')
            ->whereIn('rooms.id', $ids)
            ->select('rooms.*','room_type.name_type')
            ->get();
        return response()->json($rooms);    
    }
    //=== get free room ====\\
    public function getRoom()
    {
        $date_in = request()->query('date_in');
        $dat_out = request()->query('date_out');
        $rooms_bcs = DB::table('rooms')
                ->rightjoin('booked_packages_detail','booked_packages_detail.room_id','rooms.id')
                ->whereRaw("booked_packages_detail.check_in_date <=  date('$dat_out')")
                ->whereRaw("booked_packages_detail.check_out_date >=  date('$date_in')")
                ->get();
        $id_bc_rooms =[];
        foreach ($rooms_bcs as $rooms_bc) {
            array_push($id_bc_rooms,$rooms_bc->room_id);
        }
        $free_rooms = DB::table('rooms')
            ->leftjoin('room_type','rooms.room_type_id','room_type.id')
            ->select('rooms.*','room_type.name_type')
            ->whereNotIn('rooms.id',$id_bc_rooms)
            ->get();
            // dd($free_rooms);
        return response()->json($free_rooms);    
    }
    public function getTentByID()
    {
        $tent_id = request()->query('tent');
        $ids = (explode(",",$tent_id));
        $tents = DB::table('tents')
            ->whereIn('id', $ids)
            ->get();
        
        return response()->json($tents);
    }
    //=== get free tent===\\
    public function getTent()
    {
        $date_in = request()->query('date_in');
        $dat_out = request()->query('date_out');
       
        $tents_bc = DB::table('tents')
            ->rightjoin('tent_details','tent_details.tent_id','tents.id')
            ->whereRaw("tent_details.check_in_date <=  date('$dat_out')")
            ->whereRaw("tent_details.check_out_date >=  date('$date_in')")
            ->get();
        $id_bc_tents =[];
        foreach ($tents_bc as $tent_bc){
            array_push($id_bc_tents,$tent_bc->tent_id);
        }
        $tents_free = DB::table('tents')
            ->whereNotIn('id',$id_bc_tents)
            ->get();
        return response()->json($tents_free);
    }
    //===== get free place for camping ====\\
    public function getPlaceCamping(){
        $date_in = request()->query('date_in');
        $dat_out = request()->query('date_out');

        $quantity = DB::table('place_campings')
            ->select('total')
            ->get();
        $total_qty = $quantity[0]->total;
        $place_campings = DB::table('place_camping_details')
            ->whereRaw("check_in_date <=  date('$dat_out')")
            ->whereRaw("check_out_date >=  date('$date_in')")
            ->get();
        $qty = array();
        foreach ($place_campings as $place_camping) {
            array_push($qty,$place_camping->quantity);
            // return response()->json($qty);
        }
        $qty_active = array_sum($qty);
        $qty_available = $total_qty - $qty_active;
        return response()->json($qty_available);
    }
     
    public function getTentIDByTentDetail(){
        // $id = request()->query('room');
        $id = request()->query('id');
        // dd($id);
        $tent_ids = DB::table('tent_details') ->select('tent_id') ->where('booking_id',$id) ->get();
        $tent_id_arr = [];
        foreach ($tent_ids as $tent_id) {
            array_push($tent_id_arr, $tent_id->tent_id);
        }
        // dd($tent_id_arr);
        $tents = DB::table('tents') ->whereIn('id', $tent_id_arr) ->get();
        return response()->json($tents);
    }
    public function getRoomIDByBookingDetail(){
        $id = request()->query('id');
        $room_ids = DB::table('booked_packages_detail') ->select('room_id') ->where('booking_id',$id) ->get();
        $room_id_arr = [];
        foreach ($room_ids as $room_id) {
            array_push($room_id_arr,$room_id->room_id);
        }
        // dd($room_id_arr);
        $rooms = DB::table('rooms')
            ->leftjoin('room_type','rooms.room_type_id','room_type.id')
            ->whereIn('rooms.id', $room_id_arr)
            ->select('rooms.*','room_type.name_type')
            ->get();
        return response()->json($rooms);
    }
    public function store(Request $request)
    { 
        // dd($request->all());
        //===get sum price ====\\
        if ($request->room_ids) {
            $id_rooms = [];
            foreach($request->room_ids as $room_id) 
            {
                array_push($id_rooms,$room_id);
                $room = Room::find($room_id);
            }
            $room_price = [];
            $rooms = DB::table('rooms')
                ->whereIn('id',$id_rooms)
                ->select('price') 
                ->get();
            foreach ($rooms as $room) {
                array_push($room_price,$room->price);
            }
            $total_room_price = array_sum($room_price);
        }
        if ($request->tent_ids) {
            $id_tents =[];
            foreach ( $request->tent_ids as $tent_id ) {
                array_push($id_tents, $tent_id);
            }
            $tent_price = [];
            $tents = DB::table('tents')
                ->whereIn('id',$id_tents)
                ->select('price') 
                ->get();
            foreach ($tents as $tent) {
                array_push($tent_price,$tent->price);
            }
            $total_tent_price = array_sum($tent_price);
        }
        if ($request->place_camping) {
            $place_camping = DB::table('place_campings')->get();
            $unit_price = $place_camping[0]->unit_price;
            $total_place = $unit_price * $request->place_camping;
        }
        $total_place_camping = $request->place_camping ? $total_place : 0;
        $total_room_price = $request->room_ids ?  $total_room_price : 0;
        $total_tent_price = $request->tent_ids ? $total_tent_price : 0;
        $total_price = $total_room_price + $total_tent_price + $total_place_camping;

        $customer_info = CustomerInfomation::create([
            "name"      =>$request->name,
            "phone"      =>$request->phone
        ]);
        $customer_info_id = $customer_info->id;
        if ($customer_info) {
            $bookings = New Booked_Package;
            $bookings->customer_info_id = $customer_info_id;
            $bookings->check_in_date = $request->check_in_date;
            $bookings->check_out_date = $request->check_out_date;
            $bookings->total_price = $total_price;
            $bookings->book_advance = $request->book_advance;
            if ( !empty($request->book_advance)) {
                $status = 'Confirmed';
            } else {
                $status = 'Pending';
            }
            $bookings->status = $status;
            $bookings->save();
        }
        // dd($request->room_ids);
        if ($request->room_ids) {
            foreach($request->room_ids as $room_id) 
            {
                // dd($room_id);
                $room = Room::find($room_id);
                // dd($room);
                BookingDetail::create([
                    "booking_id"            => $bookings->id,
                    "price"                 => $room->price,
                    "check_in_date"          => $request->check_in_date,
                    "check_out_date"         => $request->check_out_date,
                    "status"                => 'sting',
                    "room_id"               => $room_id 
                ]);
            }
        }
        if ($request->tent_ids) {
            foreach ( $request->tent_ids as $tent_id ) {
                $tent = Tent::find($tent_id);
                TentDetail::create([
                    "booking_id"        =>$bookings->id,
                    "check_in_date"     =>$request->check_in_date,
                    "check_out_date"    =>$request->check_out_date,
                    "tent_id"           =>$tent_id
                ]);
            }
        }
        if ($request->place_camping) {
            $place_camping = DB::table('place_campings')->get();
            $unit_price = $place_camping[0]->unit_price;
            $total_place = $unit_price * $request->place_camping;
            PlaceCampingDetail::create([
                "booking_id"        =>$bookings->id,
                "check_in_date"     =>$request->check_in_date,
                "check_out_date"    =>$request->check_out_date,
                "quantity"          =>$request->place_camping,
                "total_price"       =>$total_place
            ]);
        }

        Session::flash('book_created','Your Package Are Booked');
        return redirect('/create_booking');
    }
    public function update(Request $request, string $id)
    { 
        // dd($request->all());
        if ($request->room_ids) {
            $id_rooms = [];
            foreach($request->room_ids as $room_id) 
            {
                array_push($id_rooms,$room_id);
                $room = Room::find($room_id);
            }
            $room_price = [];
            $rooms = DB::table('rooms')
                ->whereIn('id',$id_rooms)
                ->select('price') 
                ->get();
            foreach ($rooms as $room) {
                array_push($room_price,$room->price);
            }
            $total_room_price = array_sum($room_price);
        }
        if ($request->tent_ids) {
            $id_tents =[];
            foreach ( $request->tent_ids as $tent_id ) {
                array_push($id_tents, $tent_id);
            }
            $tent_price = [];
            $tents = DB::table('tents')
                ->whereIn('id',$id_tents)
                ->select('price') 
                ->get();
            foreach ($tents as $tent) {
                array_push($tent_price,$tent->price);
            }
            $total_tent_price = array_sum($tent_price);
        }
        $total_room_price = $request->room_ids ?  $total_room_price : 0;
        $total_tent_price = $request->tent_ids ? $total_tent_price : 0;
        $total_price = $total_room_price + $total_tent_price;
        // $total_price = $total_room_price + $total_tent_price;
        $status = DB::table('booked__packages')
            ->where('id',$id) -> select('status') ->get();
    
        $bookings = Booked_Package::findOrFail($id);
        $bookings->check_in_date = $request->Input('check_in_date');
        $bookings->check_out_date = $request->Input('check_out_date');
        $bookings->total_price = $total_price;
        $bookings->status = $status[0]->status;
        $bookings->save();

        DB::table('customer_infomations')
            ->where('customer_infomations.id', $bookings->customer_info_id)
            ->update(
                ['name'  => $request->Input('name'),
                 'phone' => $request->Input('phone')
                ]);
        

        if ($request->room_ids) {
            DB::table('booked_packages_detail')
                ->where('booked_packages_detail.booking_id', $bookings->id)
                ->delete();
            foreach ($request->room_ids as $room_id) {
                DB::table('booked_packages_detail')
                ->insert([
                    "booking_id"            => $bookings->id,
                    "price"                 => $room->price,
                    "check_in_date"         => $request->check_in_date,
                    "check_out_date"        => $request->check_out_date,
                    "status"                => 'sting',
                    "room_id"               => $room_id
                ]);
            }
        } else {
            DB::table('booked_packages_detail')
                ->where('booked_packages_detail.booking_id', $bookings->id)
                ->delete();
        }
        if ($request->tent_ids) {
            DB::table('tent_details')
                ->where('tent_details.booking_id' ,$bookings->id)
                ->delete();
            foreach ($request->tent_ids as $tent_id) {
                DB::table('tent_details')
                ->insert([
                    "booking_id"            => $bookings->id,
                    "check_in_date"         => $request->check_in_date,
                    "check_out_date"        => $request->check_out_date,
                    "tent_id"               => $tent_id
                ]);
            }
        } else {
            DB::table('tent_details')
                ->where('tent_details.booking_id' ,$bookings->id)
                ->delete();
        }
        if (empty($request->room_ids) && empty($request->tent_ids)) {
            // dd($bookings->id);
            $reject = DB::table('booked__packages')
                ->where('id', $bookings->id)
                ->update([
                    'status' => 'Reject'
                ]);
        }

        // $tent_id_hass = DB::table('tent_details')
        //     ->select('tent_id')
        //     ->where('tent_details.booking_id' ,$bookings->id)
        //     ->get();
        // $tent_ids = [];
        // // dd($tent_ids);
        // foreach ($tent_id_hass as $tent_id_has) {
        //     array_push($tent_ids,$tent_id_has->tent_id);
        // }
        // if ($request->tent_ids) {
        //     foreach ( $request->Input('tent_ids') as $tent_id ) {
        //         $old_id_tent = array_search($tent_id,$tent_ids);
        //         $tent = Tent::find($tent_id);
        //         if ($old_id_tent == false) {
        //             DB::table('tent_details')
        //             ->updateOrInsert([
        //                 "booking_id"            => $bookings->id,
        //                 "check_in_date"         => $request->check_in_date,
        //                 "check_out_date"        => $request->check_out_date,
        //                 "tent_id"               => $tent_id
        //             ]);
        //         }
        //     }
        // }
        
        Session::flash('package_updated','Your package is booked');
        return redirect('/all_booking');
    }
    public function edit ($id)
    {
        $package_booked = Booked_Package::findOrFail($id);
        // $rooms = array();
        $rooms = DB::table('rooms')
            ->leftjoin('room_type','rooms.room_type_id','room_type.id')
            ->select('rooms.*','room_type.name_type')
            ->get();
        // dd($allRoom);
    	// foreach ($allRoom as $room) {
        //     // dd($room);
    	// 	$rooms = $room;
    	// }
        // dd($allRoom);
        $place_campings = DB::table('place_camping_details')
            ->where('place_camping_details.booking_id',$id)
            ->select('quantity') 
            ->get();
        $place_total = DB::table('place_campings')->select('total')->get();
        // dd($place_campings);
        if (count($place_campings)) {
            
            foreach ($place_campings as $place_camping) {
                $qty = $place_total[0]->total;
                $place_qty = $place_camping->quantity;
                $qty_last = $qty - $place_qty;
            }
        } else {
            
            $place_qty = 0;
            $qty_last = $place_total[0]->total;
        }
        
        // dd($place_campings);
        $tents = Tent::all();
        $customer_infomations = DB::table('customer_infomations') 
            ->where('id',$package_booked->customer_info_id) 
            ->get();
        foreach ($customer_infomations as $customer_infomation) {}
        return view('booking.edit',['rooms' => $rooms,'package_booked' => $package_booked, 'place_qty'=>$place_qty,'tents'=>$tents,'customer_infomation'=>$customer_infomation,'qty_place'=>$qty_last]);
    }
    public function destroy($id)
    {
        $booking = Booked_Package::findOrFail($id);
        DB::table('customer_infomations')
            ->where('id', $booking->customer_info_id)
            ->delete();
        $booking->delete();
        Session::flash('package_delete','Your Booking Package is Deleted');
        return redirect('all_booking');
    }
    public function getBookingDetail($id){
        $customer_info = DB::table('booked__packages')
            ->leftjoin('customer_infomations','booked__packages.customer_info_id','customer_infomations.id')
            ->where('booked__packages.id',$id)
            ->get();
        $rooms = DB::table('booked__packages')
            ->leftjoin('booked_packages_detail','booked_packages_detail.booking_id','booked__packages.id')
            ->leftjoin('rooms','booked_packages_detail.room_id','rooms.id')
            ->where('booked_packages_detail.booking_id',$id)
            ->select('rooms.*')
            ->get();
        $tents = DB::table('booked__packages')
            ->leftjoin('tent_details','booked__packages.id','tent_details.booking_id')
            ->leftjoin('tents','tent_details.tent_id','tents.id')
            ->where('tent_details.booking_id',$id)
            ->select('tents.*')
            ->get();
        $quantity_place_camping = DB::table('booked__packages')
            ->leftjoin('place_camping_details','booked__packages.id','place_camping_details.booking_id')
            ->select('place_camping_details.quantity')
            ->get();
        return view('booking.details',compact('customer_info','rooms','tents','quantity_place_camping'));
    }
    public function addPaidBooking(){
        $booking_id = request()->query('booking_id');
        $paid = request()->query('paid');
        $amount = DB::table('booked__packages')
            ->where('id', $booking_id)
            ->select('total_price')
            ->get();
        $excess_paid = $paid > $amount[0]->total_price;
        if ($excess_paid) {
            return response()->json($excess_paid);
        } else {
            DB::table('booked__packages')
            ->where('id', $booking_id)
            ->update([
                'book_advance'  => $paid,
                'status'        => 'Confirmed'
            ]);
        }
    }
    public function notPaidBooking(){
        $booking_id = request()->query('booking_id');
        $status = DB::table('booked__packages')
            ->where('id', $booking_id)
            ->select('status')
            ->get();
        return response()->json($status);
    }
    public function paymentBooking(){
        $booking_id = request()->query('booking_id');
        $unpaid = DB::table('booked__packages')
            ->where('id',$booking_id)
            ->select('book_advance')
            ->selectRaw('total_price - book_advance as unpaid')
            ->get();
        $paid = $unpaid[0]->book_advance + $unpaid[0]->unpaid;
        DB::table('booked__packages')
            ->where('id',$booking_id)
            ->update([
                'book_advance'    =>$paid,
                'status'  => "Success"
            ]);
    }
    public function getStatus(){
        
        $booking_id = request()->query('booking_id');
        // dd($booking_id);
        $status = DB::table('booked__packages')
            ->where('id', $booking_id)
            ->select('status','id')
            ->get();
        // dd($status);
        return response()->json($status);
    }
    public function cancelBooking(){
        $booking_id = request()->query('booking_id');
        DB::table('booked__packages')
            ->where('id', $booking_id)
            ->update([
                'status' =>  'Reject'
            ]);
    }
    public function getInvice(){
        $booking_id = request()->query('booking_id');
        $customer_info = DB::table('booked__packages')
            ->leftjoin('customer_infomations','booked__packages.customer_info_id','customer_infomations.id')
            ->where('booked__packages.id',$booking_id)
            ->get();
        $room = DB::table('booked__packages')
            ->leftjoin('booked_packages_detail','booked_packages_detail.booking_id','booked__packages.id')
            ->leftjoin('rooms','booked_packages_detail.room_id','rooms.id')
            ->where('booked_packages_detail.booking_id',$booking_id)
            ->select('rooms.*')
            ->get();
        $tent = DB::table('booked__packages')
            ->leftjoin('tent_details','booked__packages.id','tent_details.booking_id')
            ->leftjoin('tents','tent_details.tent_id','tents.id')
            ->where('tent_details.booking_id',$booking_id)
            ->select('tents.*')
            ->get();
        $quantity_place_camping = DB::table('booked__packages')
            ->leftjoin('place_camping_details','booked__packages.id','place_camping_details.booking_id')
            ->where('place_camping_details.booking_id',$booking_id)
            ->select('place_camping_details.quantity')
            ->get();
            // dd($quantity_place_camping);
        $place_camping = DB::table('place_campings') ->select('unit_price') ->get();
        $data_place = $quantity_place_camping->merge($place_camping);
        // dd($quantity_place_camping);
        $room_price = [];
        $tent_price = [];
        if ( !empty($quantity_place_camping[0]) ) {
            // dd('123');
            $place_p = $quantity_place_camping[0]->quantity * $place_camping[0]->unit_price;
        } else {
            // dd('321');
            $place_p = 0;
        }
        // dd($place_p);
        if ($room) {
            foreach ($room as $room_p) {
                array_push( $room_price,$room_p->price);
            }
        }
        // dd($room_price);
        if ($tent) {
            foreach ($tent as $tent_p) {
                array_push( $tent_price,$tent_p->price);
            }
        }
        
        
        $total = array_sum($room_price) + array_sum($tent_price) + $place_p;
        // dd($total);
        
        return response()->json([
            'data' =>[
                'customer_info'     => $customer_info,
                'room'              => $room,
                'tent'              => $tent,
                'data_place'        => $data_place,
                'total'             => $total,
            ]
        ]);
    }
    public function testget(){
        
        $room = DB::table('rooms') ->get();
        return response()->json($room);
    }
    public function getReport (Request $request){
        // if ($request->d_from && $request->d_to) {
        //     $data = DB::table('booked__packages')
        //     ->leftJoin( 'customer_infomations', 'customer_infomations.id','=', 'booked__packages.customer_info_id' )
        //     ->select( 'customer_infomations.*','booked__packages.*')
        //     ->selectRaw('booked__packages.total_price - booked__packages.book_advance as balance')
        //     ->whereBetween('booked__packages.created_at',[date($request->d_from),date($request->d_to)])
        //     ->get();
        // } else {
        //     $data = DB::table('booked__packages')
        //         ->leftJoin( 'customer_infomations', 'customer_infomations.id','=', 'booked__packages.customer_info_id' )
        //         ->select( 'customer_infomations.*','booked__packages.*')
        //         ->selectRaw('booked__packages.total_price - booked__packages.book_advance as balance')
        //         ->get();
        // }
        if(request()->ajax()) {
            if ($request->d_from && $request->d_to) {
                $data = DB::table('booked__packages')
                ->leftJoin( 'customer_infomations', 'customer_infomations.id','=', 'booked__packages.customer_info_id' )
                ->select( 'customer_infomations.*','booked__packages.*')
                ->selectRaw('booked__packages.total_price - booked__packages.book_advance as balance')
                ->whereBetween('booked__packages.created_at',[date($request->d_from),date($request->d_to)])
                ->get();
            } else {
                $data = DB::table('booked__packages')
                ->leftJoin( 'customer_infomations', 'customer_infomations.id','=', 'booked__packages.customer_info_id' )
                ->select( 'customer_infomations.*','booked__packages.*')
                ->selectRaw('booked__packages.total_price - booked__packages.book_advance as balance')
                ->get();
            }
            return DataTables::of($data)
            ->toJson();         
        }
        return view('report/index');
    }
    public function getRoomType() {
        $type = request()->query('type');
        $date_in = request()->query('date_in');
        $dat_out = request()->query('date_out');

        $rooms_bcs = DB::table('rooms')
                ->rightjoin('booked_packages_detail','booked_packages_detail.room_id','rooms.id')
                ->whereRaw("booked_packages_detail.check_in_date <=  date('$dat_out')")
                ->whereRaw("booked_packages_detail.check_out_date >=  date('$date_in')")
                ->get();
        $id_bc_rooms =[];
        foreach ($rooms_bcs as $rooms_bc) {
            array_push($id_bc_rooms,$rooms_bc->room_id);
        }
        $free_rooms = DB::table('rooms')
            ->whereNotIn('rooms.id',$id_bc_rooms)
            ->where(function($query) use ($type){
                $query->where('type', 'like', '%' .$type. '%')
                    ->orwhere('price', 'like', '%' . $type . '%')
                    // ->orwhere('beb', 'like', '%' . $type . '%');
                    ->orwhere('name', 'like','%' . $type . '%');
            })
            ->get();
        dd($free_rooms);
        return response()->json($free_rooms);
       
    }
    public function getRoomTypeBycheck() {
        if (request()->query('type')) {
            // dd('type');
            $type = request()->query('type');
            $date_in = request()->query('date_in');
            $dat_out = request()->query('date_out');

            $rooms_bcs = DB::table('rooms')
                    ->rightjoin('booked_packages_detail','booked_packages_detail.room_id','rooms.id')
                    ->whereRaw("booked_packages_detail.check_in_date <=  date('$dat_out')")
                    ->whereRaw("booked_packages_detail.check_out_date >=  date('$date_in')")
                    ->get();
            $id_bc_rooms =[];
            foreach ($rooms_bcs as $rooms_bc) {
                array_push($id_bc_rooms,$rooms_bc->room_id);
            }
            $free_rooms = DB::table('rooms')
                ->leftjoin('room_type','rooms.room_type_id','room_type.id')
                ->whereNotIn('rooms.id',$id_bc_rooms)
                ->where('rooms.room_type_id',$type)
                ->select('rooms.*','room_type.name_type')
                ->get();
            // dd($free_rooms);
            return response()->json($free_rooms);
        } elseif (request()->query('bed')){
            // dd('bed');
            $bed = request()->query('bed');
            $date_in = request()->query('date_in');
            $dat_out = request()->query('date_out');

            $rooms_bcs = DB::table('rooms')
                    ->rightjoin('booked_packages_detail','booked_packages_detail.room_id','rooms.id')
                    ->whereRaw("booked_packages_detail.check_in_date <=  date('$dat_out')")
                    ->whereRaw("booked_packages_detail.check_out_date >=  date('$date_in')")
                    ->get();
            $id_bc_rooms =[];
            foreach ($rooms_bcs as $rooms_bc) {
                array_push($id_bc_rooms,$rooms_bc->room_id);
            }
            $free_rooms = DB::table('rooms')
                ->leftjoin('room_type','rooms.room_type_id','room_type.id')
                ->whereNotIn('rooms.id',$id_bc_rooms)
                ->where('rooms.bed',$bed)
                ->select('rooms.*','room_type.name_type')
                ->get();
            // dd($free_rooms);
            return response()->json($free_rooms);
        } elseif (request()->query('type') && request()->query('bed')) {
            dd('2value');
        }
        if (request()->query('min') && request()->query('max')) {
            // dd('min&max');
            $min = request()->query('min');
            $max = request()->query('max');
            $date_in = request()->query('date_in');
            $dat_out = request()->query('date_out');

            $rooms_bcs = DB::table('rooms')
                    ->rightjoin('booked_packages_detail','booked_packages_detail.room_id','rooms.id')
                    ->whereRaw("booked_packages_detail.check_in_date <=  date('$dat_out')")
                    ->whereRaw("booked_packages_detail.check_out_date >=  date('$date_in')")
                    ->get();
            $id_bc_rooms =[];
            foreach ($rooms_bcs as $rooms_bc) {
                array_push($id_bc_rooms,$rooms_bc->room_id);
            }
            $free_rooms = DB::table('rooms')
                ->leftjoin('room_type','rooms.room_type_id','room_type.id')
                ->whereNotIn('rooms.id',$id_bc_rooms)
                ->whereBetween('rooms.price',[$min,$max])
                ->select('rooms.*','room_type.name_type')
                ->get();
            // dd($free_rooms);
            return response()->json($free_rooms);
        }
        // if (request()->query('type') && request()->query('bed')) {
        //     dd('bed');
        //     $bed = request()->query('bed');
        //     $type = request()->query('type');
        //     $date_in = request()->query('date_in');
        //     $dat_out = request()->query('date_out');

        //     $rooms_bcs = DB::table('rooms')
        //             ->rightjoin('booked_packages_detail','booked_packages_detail.room_id','rooms.id')
        //             ->whereRaw("booked_packages_detail.check_in_date <=  date('$dat_out')")
        //             ->whereRaw("booked_packages_detail.check_out_date >=  date('$date_in')")
        //             ->get();
        //     $id_bc_rooms =[];
        //     foreach ($rooms_bcs as $rooms_bc) {
        //         array_push($id_bc_rooms,$rooms_bc->room_id);
        //     }
        //     $free_rooms = DB::table('rooms')
        //         ->leftjoin('room_type','rooms.room_type_id','room_type.id')
        //         ->whereNotIn('rooms.id',$id_bc_rooms)
        //         ->where('rooms.bed',$bed)
        //         ->orwhere('rooms.room_type.id',$type)
        //         ->select('rooms.*','room_type.name_type')
        //         ->get();
        //     dd($free_rooms);
        //     return response()->json($free_rooms);
        // }
            // $type = request()->query('type');
            // $date_in = request()->query('date_in');
            // $dat_out = request()->query('date_out');

            // $rooms_bcs = DB::table('rooms')
            //         ->rightjoin('booked_packages_detail','booked_packages_detail.room_id','rooms.id')
            //         ->whereRaw("booked_packages_detail.check_in_date <=  date('$dat_out')")
            //         ->whereRaw("booked_packages_detail.check_out_date >=  date('$date_in')")
            //         ->get();
            // $id_bc_rooms =[];
            // foreach ($rooms_bcs as $rooms_bc) {
            //     array_push($id_bc_rooms,$rooms_bc->room_id);
            // }
            // $free_rooms = DB::table('rooms')
            //     ->leftjoin('room_type','rooms.room_type_id','room_type.id')
            //     ->whereNotIn('rooms.id',$id_bc_rooms)
            //     ->where('rooms.room_type_id',$type)
            //     ->select('rooms.*','room_type.name_type')
            //     ->get();
            // // dd($free_rooms);
            // return response()->json($free_rooms);
    } 
    public function getRoomMulticheck() {
        if (request()->query('type') && request()->query('bed')) {
            $bed = request()->query('bed');
            $type = request()->query('type');
            $date_in = request()->query('date_in');
            $dat_out = request()->query('date_out');
            // dd()
            $rooms_bcs = DB::table('rooms')
                    ->rightjoin('booked_packages_detail','booked_packages_detail.room_id','rooms.id')
                    ->whereRaw("booked_packages_detail.check_in_date <=  date('$dat_out')")
                    ->whereRaw("booked_packages_detail.check_out_date >=  date('$date_in')")
                    ->get();
            $id_bc_rooms =[];
            foreach ($rooms_bcs as $rooms_bc) {
                array_push($id_bc_rooms,$rooms_bc->room_id);
            }
            $free_rooms = DB::table('rooms')
                ->leftjoin('room_type','rooms.room_type_id','room_type.id')
                ->whereNotIn('rooms.id',$id_bc_rooms)
                ->where('rooms.bed',$bed)
                ->where('rooms.room_type_id',$type)
                ->select('rooms.*','room_type.name_type')
                ->get();
            // dd($free_rooms);
            return response()->json($free_rooms);
        }
    } 
    public function getTypeRoom(){
        $room_type = DB::table('room_type')->get();
        return response()->json($room_type);
    }
    public function getRoomPrice(){
        if ( request()->query('min') && request()->query('max') && request()->query('type') ) {
        //    dd('3value');
            $type = request()->query('type');
            $min = request()->query('min');
            $max = request()->query('max');
            $date_in = request()->query('date_in');
            $dat_out = request()->query('date_out');

            $rooms_bcs = DB::table('rooms')
                    ->rightjoin('booked_packages_detail','booked_packages_detail.room_id','rooms.id')
                    ->whereRaw("booked_packages_detail.check_in_date <=  date('$dat_out')")
                    ->whereRaw("booked_packages_detail.check_out_date >=  date('$date_in')")
                    ->get();
            $id_bc_rooms =[];
            foreach ($rooms_bcs as $rooms_bc) {
                array_push($id_bc_rooms,$rooms_bc->room_id);
            }
            $free_rooms = DB::table('rooms')
                ->leftjoin('room_type','rooms.room_type_id','room_type.id')
                ->whereNotIn('rooms.id',$id_bc_rooms)
                ->whereBetween('rooms.price',[$min,$max])
                ->where('rooms.room_type_id', $type)
                ->select('rooms.*','room_type.name_type')
                ->get();
            // dd($free_rooms);
            return response()->json($free_rooms);
        } elseif ( request()->query('min') && request()->query('max') && request()->query('bed') ) {
            // dd('hasbed');
            $bed = request()->query('bed');
            $min = request()->query('min');
            $max = request()->query('max');
            $date_in = request()->query('date_in');
            $dat_out = request()->query('date_out');

            $rooms_bcs = DB::table('rooms')
                    ->rightjoin('booked_packages_detail','booked_packages_detail.room_id','rooms.id')
                    ->whereRaw("booked_packages_detail.check_in_date <=  date('$dat_out')")
                    ->whereRaw("booked_packages_detail.check_out_date >=  date('$date_in')")
                    ->get();
            $id_bc_rooms =[];
            foreach ($rooms_bcs as $rooms_bc) {
                array_push($id_bc_rooms,$rooms_bc->room_id);
            }
            $free_rooms = DB::table('rooms')
                ->leftjoin('room_type','rooms.room_type_id','room_type.id')
                ->whereNotIn('rooms.id',$id_bc_rooms)
                ->whereBetween('rooms.price',[$min,$max])
                ->where('rooms.bed', $bed)
                ->select('rooms.*','room_type.name_type')
                ->get();
            // dd($free_rooms);
            return response()->json($free_rooms);
        }
    }
    public function getRoomPriceMultiP(){
        if (request()->query('min') && request()->query('max') && request()->query('type') && request()->query('bed')) {
        //    dd('4value');
            $bed = request()->query('bed');
            $type = request()->query('type');
            $min = request()->query('min');
            $max = request()->query('max');
            $date_in = request()->query('date_in');
            $dat_out = request()->query('date_out');

            $rooms_bcs = DB::table('rooms')
                    ->rightjoin('booked_packages_detail','booked_packages_detail.room_id','rooms.id')
                    ->whereRaw("booked_packages_detail.check_in_date <=  date('$dat_out')")
                    ->whereRaw("booked_packages_detail.check_out_date >=  date('$date_in')")
                    ->get();
            $id_bc_rooms =[];
            foreach ($rooms_bcs as $rooms_bc) {
                array_push($id_bc_rooms,$rooms_bc->room_id);
            }
            $free_rooms = DB::table('rooms')
                ->leftjoin('room_type','rooms.room_type_id','room_type.id')
                ->whereNotIn('rooms.id',$id_bc_rooms)
                ->whereBetween('rooms.price',[$min,$max])
                ->where('rooms.bed', $bed)
                ->where('rooms.room_type_id',$type)
                ->select('rooms.*','room_type.name_type')
                ->get();
            // dd($free_rooms);
            return response()->json($free_rooms);
        }
    }
    public function getTentType() {
        $type = request()->query('type');
        $date_in = request()->query('date_in');
        $dat_out = request()->query('date_out');

        $tents_bc = DB::table('tents')
            ->rightjoin('tent_details','tent_details.tent_id','tents.id')
            ->whereRaw("tent_details.check_in_date <=  date('$dat_out')")
            ->whereRaw("tent_details.check_out_date >=  date('$date_in')")
            ->get();
        $id_bc_tents =[];
        foreach ($tents_bc as $tent_bc){
            array_push($id_bc_tents,$tent_bc->tent_id);
        }
        $tents_free = DB::table('tents')
            ->whereNotIn('id',$id_bc_tents)
            ->where(function($query) use ($type){
                $query->where('type', 'like', '%' .$type. '%')
                    ->orwhere('price', 'like', '%' . $type . '%')
                    ->orwhere('name', 'like','%' . $type . '%');
            })
            ->get();
        return response()->json($tents_free);
    }
    
}
