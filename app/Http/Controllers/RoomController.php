<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Session;
use DataTables;
use Validator;

class RoomController extends Controller
{
    public function index(Request $request)
    {  
        if (request()->ajax()) {
            $data = Room::get();
            return Datatables::of($data)
                ->addColumn('action','rooms.actions')
                ->toJson();
        }
        return view('rooms.index');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $validator = Validator::make($request->all(), [
        //     'image' => 'required|mimes:jpg,jpeg,png,gif',
        //     'price' => 'required',
        // ]);
        // if ($validator->fails()) {
        //     return redirect('rooms/create')
        //         ->withInput()
        //         ->withErrors($validator);
        // }
        if (($request->image)) {
            $image = $request->file('image');
            $upload = 'img/room/';
            $filename = time().$image->getClientOriginalName();
            $path = move_uploaded_file($image->getPathName(), $upload. $filename);
        }
        
        $rooms = new Room;
        $rooms->name = $request->name;
        $rooms->type = $request->type;
        $rooms->bed = $request->bed;
        if ($request->image) {
            $rooms->image = $filename;
        } else {
            $rooms->image = null;
        }
        $rooms->price = $request->price;
        $rooms->save();
        
        Session::flash('room_created','Room is Created');

    return redirect('/room_create');
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
    public function edit($id)
    {
        $rooms = Room::findOrFail($id);
        return view('rooms.edit')->with('rooms', $rooms);
    }

    public function update(Request $request, string $id)
    {
        if (($request->image)) {
            $image = $request->file('image');
            $upload = 'img/room/';
            $filename = time().$image->getClientOriginalName();
            $path = move_uploaded_file($image->getPathName(), $upload. $filename);
        }
        
        $rooms = Room::findOrFail($id);
        $rooms->name = $request->Input('name');
        $rooms->type = $request->Input('type');
        $rooms->bed = $request->Input('bed') ? $request->Input('bed') : $request->bed;
        if ($request->image) {
            $rooms->image = $filename;
        } else {
            $rooms->image = null;
        }
        $rooms->price = $request->Input('price');
        $rooms->save();
        
        Session::flash('room_updated','Room is Updated');

    return redirect('/rooms');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       //
    }
    public function create(){
        return view('rooms/create');
    }
}
