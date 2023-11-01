<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booked_Package;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = Booked_Package::get();
        $booking_total = count($data);
        $pending = Booked_Package::where('status','Pending') ->get();
        $booking_pending = count($pending);
        $success = Booked_Package::where('status','Success') ->get();
        $booking_success = count($success);
        $confirm = Booked_Package::where('status','Confirmed') ->get();
        $booking_confirm = count($confirm);
        $reject = Booked_Package::where('status','Reject') ->get();
        $booking_reject = count($reject);
        return view('admin.index',compact('booking_total','booking_pending','booking_success','booking_confirm','booking_reject'));
    }
}
