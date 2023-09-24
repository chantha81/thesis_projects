<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booked_Package;
use App\Models\Room;
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
        // $data = DB::table('booked__packages')->get();
        // dd($data);
        if(request()->ajax()) {
            // return 'ajax';
            $data = DB::table('booked__packages')->get();
            return DataTables::of($data)
            ->addColumn('action', 'booking.actions')
            ->toJson();      
        }
        return view('booking.index');
        // return 'Http';
    }
    public function create()
    {
        // $arr_room = Room::all();
        $rooms = array();
    	foreach (Room::all() as $room) {
    		$rooms = $room->all();
    	}
        return view('booking.create')->with('rooms', $rooms);
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
    public function store(Request $request)
    {
        
        // dd($request->all());
        // request()->validate([
        //     'name' => 'required',
        //     'detail' => 'required',
        // ]);
    
        // Product::create($request->all());
    
        // return redirect()->route('products.index')
        //     ->with('success','Product created successfully.');

        $bookings = New Booked_Package;
        $bookings->arrival_date = $request->arrival_date;
        $bookings->depature_date = $request->depature_date;
        $bookings->booking_code = $request->booking_code;
        $bookings->name = $request->name;
        $bookings->phone = $request->phone;
        $bookings->email = $request->email;
        
        $room_id_str = implode(',', $request->room_ids);
        $bookings->room_ids = $room_id_str;
        $bookings->tent_id = $request->tent_id;
        $bookings->total_price = $request->total_price;
        $bookings->status = $request->status;
        $bookings->save();
        
        Session::flash('book_created','Your Package Are Booked');

    return redirect('/create_booking');
    }
}
