<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RoomType;
use Session;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $room_type = DB::table('room_type') ->get();
        $room_type = RoomType::get();

        // dd($room_type);
        return view('room_type.index', compact('room_type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('room_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        RoomType::create([
            "name_type" => $request->room_type
        ]);
        Session::flash('typeRoom','Room Type is Created');
        return redirect()->route('room_type.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        RoomType::find($id)->delete();
        Session::flash('delete_type','Type Room is Deleted');
        return redirect()->route('room_type.index');
    }
}
