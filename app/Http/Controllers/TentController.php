<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tent;
use Illuminate\View\View;
use Session;
use DataTables;
use Illuminate\Support\Facades\DB;

class TentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = DB::table('tents') ->get();
            return DataTables::of($data)
            ->addColumn('action', 'tents.actions')
            ->toJson(); 
        }
        return view('tents/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tents/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if (($request->image)) {
            $image = $request->file('image');
            $upload = 'img/tent/';
            $filename = time().$image->getClientOriginalName();
            $path = move_uploaded_file($image->getPathName(), $upload. $filename);
        } else{
            $filename = null;
        }
        Tent::create([
            'name'  => $request->name,
            'type'  => $request->type,
            'price' => $request->price,
            'image' => $filename
        ]);
        Session::flash('tent_add','Tent is Created');
        return redirect()->route('tents.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tent = Tent::find($id);
        return view('tents/edit',compact('tent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $input = $request->all();
       $tent = Tent::find($id);
       $tent->update($input);
       return redirect()->route('tents.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd($id);
      $tent_id = Tent::find($id);
       $tent = DB::table('tents')
        ->where('id', '=' ,$id )
        ->get();
        dd($tent);
        return redirect()->route('tents.index');
    }
    public function delete(string $id)
    {
        Tent::find($id) ->delete();
        return redirect()->route('tents.index');
    }
}
