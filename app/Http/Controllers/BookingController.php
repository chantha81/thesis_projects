<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booked_Package;
use App\Models\Room;
use App\Models\Tent;
use App\Models\BookingDetail;
use App\Models\TentDetail;
use App\Models\Accessories;
use App\Models\CustomerInfomation;
use App\Models\PlaceCamping;
use Session;
use DataTables;

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

        if(request()->ajax()) {
            $data = DB::table('booked__packages')
                ->rightJoin( 'customer_infomations', 'customer_infomations.id','=', 'booked__packages.customer_info_id' )
                ->select( 'customer_infomations.*','booked__packages.*' )
                ->get();
                // dd($data);
            return DataTables::of($data)
            ->addColumn('action', 'booking.actions')
            ->toJson();      
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
        $place_campings = DB::table('place_campings') 
            ->select('quantity') 
            ->get();
        foreach ($place_campings as $place_camping) {}
        $tents = Tent::all();
        return view('booking.create',['tents'=>$tents,'place_camping'=>$place_camping])->with('rooms', $rooms);
    }
    public function getRoomByID()
    {
        $room_id = request()->query('room');
        $ids = (explode(",",$room_id));
        $rooms = DB::table('rooms')
            ->whereIn('id', $ids)
            ->get();
        return response()->json($rooms);
        
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
            ->whereIn('id', $room_id_arr)
            ->get();
        return response()->json($rooms);
    }
    public function store(Request $request)
    {
        
        // dd($request->all());
        $place_campings = PlaceCamping::all();
        foreach ($place_campings as $place_camping) {
            $place_camping_qty_old = $place_camping->quantity;
        }
        if ($request->place_camping) {
            $place_camping_qty_new = $place_camping_qty_old - $request->place_camping;
                DB::table('place_campings')
                ->update(['quantity' => $place_camping_qty_new]);
        }
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
        $total_price = $total_room_price + $total_tent_price;
        // request()->validate([
        //     'name' => 'required',
        // ]);
        // Product::create($request->all());
        // return redirect()->route('products.index')
        //     ->with('success','Product created successfully.');

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
            $bookings->booking_code = $request->booking_code;
            $bookings->total_price = $total_price;
            $bookings->status = $request->status;
            $bookings->save();
        }
        
        if ($request->room_ids) {
            foreach($request->room_ids as $room_id) 
            {
                $room = Room::find($room_id);
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

        Session::flash('book_created','Your Package Are Booked');

        return redirect('/create_booking');
    }
    public function update(Request $request, string $id)
    { 
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
        $total_price = $total_room_price + $total_tent_price;

        $bookings = Booked_Package::findOrFail($id);
        $bookings->check_in_date = $request->Input('check_in_date');
        $bookings->check_out_date = $request->Input('check_out_date');
        $bookings->total_price = $total_price;
        $bookings->status = $request->Input('status');
        $bookings->save();

        DB::table('customer_infomations')
            ->where('customer_infomations.id', $bookings->customer_info_id)
            ->update(
                ['name'  => $request->Input('name'),
                 'phone' => $request->Input('phone')
                ]);
        
        $room_id_hass = DB::table('booked_packages_detail')
            ->select('room_id')
            ->where('booked_packages_detail.booking_id' ,$bookings->id)
            ->get();
        $room_ids = [];
        foreach ($room_id_hass as $room_id_has) {
            array_push($room_ids,$room_id_has->room_id);
        }
        foreach($request->room_ids as $room_id) 
        {
            $old_id_room = array_search($room_id,$room_ids);
            $room = Room::find($room_id);
            DB::table('booked_packages_detail')
                ->where('booked_packages_detail.booking_id', $bookings->id)
                ->update([
                    'check_in_date'     => $request->check_in_date,
                    'check_out_date'    => $request->check_out_date,
            ]);
            if ($old_id_room == false) {
                DB::table('booked_packages_detail')
                ->updateOrInsert([
                    "booking_id"            => $bookings->id,
                    "price"                 => $room->price,
                    "check_in_date"         => $request->check_in_date,
                    "check_out_date"        => $request->check_out_date,
                    "status"                => 'sting',
                    "room_id"               => $room_id
                ]);
            } 
            
        }
        $tent_id_hass = DB::table('tent_details')
            ->select('tent_id')
            ->where('tent_details.booking_id' ,$bookings->id)
            ->get();
        $tent_ids = [];
        foreach ($tent_id_hass as $tent_id_has) {
            array_push($tent_ids,$tent_id_has->tent_id);
        }
        foreach ( $request->Input('tent_ids') as $tent_id ) {
            $old_id_tent = array_search($tent_id,$tent_ids);
            $tent = Tent::find($tent_id);
            if ($old_id_tent == false) {
                DB::table('tent_details')
                ->updateOrInsert([
                    "booking_id"            => $bookings->id,
                    "check_in_date"         => $request->check_in_date,
                    "check_out_date"        => $request->check_out_date,
                    "tent_id"               => $tent_id
                ]);
            }
        }
        Session::flash('package_updated','Your package is booked');
        return redirect('/all_booking');
    }
    public function edit ($id)
    {
        $package_booked = Booked_Package::findOrFail($id);
        $rooms = array();
    	foreach (Room::all() as $room) {
    		$rooms = $room->all();
    	}
        $place_campings = DB::table('place_campings')
            ->select('quantity') 
            ->get();
        foreach ($place_campings as $place_camping) {}
        $tents = Tent::all();
        $customer_infomations = DB::table('customer_infomations') 
            ->where('id',$package_booked->customer_info_id) 
            ->get();
        foreach ($customer_infomations as $customer_infomation) {}
        return view('booking.edit',['rooms' => $rooms,'package_booked' => $package_booked, 'place_camping'=>$place_camping,'tents'=>$tents,'customer_infomation'=>$customer_infomation]);
    }
    public function destroy($id)
    {
        Booked_Package::findOrFail($id)
            ->delete();
        Session::flash('package_delete','Your Booking Package is Deleted');
        return redirect('all_booking');
    }
}
