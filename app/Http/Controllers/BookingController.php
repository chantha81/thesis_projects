<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booked_Package;
use App\Models\Room;
use App\Models\Tent;
use App\Models\BookingDetail;
use App\Models\Accessories;
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
                ->leftJoin( 'booked_packages_detail', 'booked__packages.id','=','booked_packages_detail.booked_package_id' )
                ->rightJoin( 'rooms', 'rooms.id','=','booked_packages_detail.room_id' )
                ->rightJoin( 'customer_info', 'customer_info.id','=', 'booked__packages.customer_info_id' )
                ->select( 'customer_info.*','booked__packages.*' )
                ->get();
            // dd($data);
            // $data = DB::table('booked__packages')->get();
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
        $tents = Tent::all();
        return view('booking.create',['tents'=>$tents])->with('rooms', $rooms);
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
    public function store(Request $request)
    {
        // dd($request->all());
        request()->validate([
            'name' => 'required',
        ]);
        // Product::create($request->all());
        // return redirect()->route('products.index')
        //     ->with('success','Product created successfully.');
        $request->room_ids ? $room_id_str = implode(',', $request->room_ids) : $room_id_str = '';
        $bookings = New Booked_Package;
        $bookings->arrival_date = $request->arrival_date;
        $bookings->depature_date = $request->depature_date;
        $bookings->booking_code = $request->booking_code;
        $bookings->name = $request->name;
        $bookings->phone = $request->phone;
        $bookings->email = $request->email;
        
        $bookings->room_ids = $room_id_str;
        $bookings->tent_id = $request->tent_id;
        $bookings->total_price = $request->total_price;
        $bookings->status = $request->status;
        $bookings->save();

        foreach($request->room_ids as $room_id) {
            $room = Room::find($room_id);
            BookingDetail::create([
                "book_id" => $bookings->id,
                "price" => $room->price,
                "arrival_date" => $request->arrival_date,
                "depature_date" => $request->depature_date,
                "status" => 'sting',
                "room_id" => $room_id
            ]);
        }
        Session::flash('book_created','Your Package Are Booked');

        return redirect('/create_booking');
    }
    public function update(Request $request, string $id)
    { 
        $bookings = Booked_Package::findOrFail($id);
        $bookings->arrival_date = $request->Input('arrival_date');
        $bookings->depature_date = $request->Input('depature_date');
        $bookings->booking_code = $request->Input('booking_code');
        $bookings->name = $request->Input('name');
        $bookings->phone = $request->Input('phone');
        $bookings->email = $request->Input('email');
        $request->Input('room_ids') ? $room_id_str = implode(',', $request->Input('room_ids')) : $room_id_str ='';
        $bookings->room_ids = $room_id_str;
        $bookings->tent_id = $request->Input('tent_id');
        $bookings->total_price = $request->Input('total_price');
        $bookings->status = $request->Input('status');
        $bookings->save();
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
        $room_ids = DB::table('booked__packages')
            ->select('room_ids')
            // ->whereIn('room_ids',$package_booked)
            ->get();
        return view('booking.edit',['rooms' => $rooms,'package_booked' => $package_booked]);
    }
    public function destroy($id)
    {
        Booked_Package::findOrFail($id)
            ->delete();
        Session::flash('package_delete','Your Booking Package is Deleted');
        return redirect('all_booking');
    }
}
