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
        if(request()->ajax()) {
            $data = DB::table('booked__packages')->get();
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
        request()->validate([
            'name' => 'required',
        ]);
        // Product::create($request->all());
        // return redirect()->route('products.index')
        //     ->with('success','Product created successfully.');
        $request->room_ids ? $room_id_str = implode(',', $request->room_ids) : $room_id_str = 'null';
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
        
        Session::flash('book_created','Your Package Are Booked');

        return redirect('/create_booking');
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
        // return $package_booked;
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
