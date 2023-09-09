<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accessories;
use Session;
use DataTables;
use Validator;

class AccessoriesController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Accessories::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'accessories.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('accessories.index');
    }
    public function create()
    {
        return view('accessories/create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'name' => 'required|max:20|min:3',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'duration' => 'required',
            'price' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('accessories/create')
                ->withInput()
                ->withErrors($validator);
        }
        $image = $request->file('image');
        $upload = 'img/accessories/';
        $filename = time().$image->getClientOriginalName();
        $path = move_uploaded_file($image->getPathName(), $upload. $filename);

        $accessories = new Accessories;
        $accessories->code = $request->code;
        $accessories->name = $request->name;
        $accessories->image = $filename;
        $accessories->type = $request->type;
        $accessories->duration = $request->duration;
        $accessories->price = $request->price;
        $accessories->save();
        Session::flash('accessories_created','New Accessories is Created');
    return redirect('accessories/create');
        
    }
    public function edit($id)
    {
        $accessories = Accessories::findOrFail($id);
         return view('accessories.edit')
        ->with('accessories', $accessories);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'name' => 'required|max:20|min:3',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'duration' => 'required',
            'price' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect('accessories/'.$id.'/edit')
                ->withInput()
                ->withErrors($validator);
        }
        
        if($request->file('image') != ""){
            $image = $request->file('image');
            $upload = 'img/accessories/';
            $filename = time().$image->getClientOriginalName();
            $path = move_uploaded_file($image->getPathName(), $upload. $filename);
        }
        
        $accessories = Accessories::findOrFail($id);
        $accessories->code = $request->Input('code');
        $accessories->name = $request->Input('name');
        if(isset($filename)){
		    $accessories->image = $filename;
		}
        // $accessories->image = $filename;
        $accessories->type = $request->Input('type');
        $accessories->duration = $request->Input('duration');
        $accessories->price = $request->Input('price');
        $accessories->save();
    Session::flash('Accessories_create','New Accessories is Created');
    return redirect()->route('accessories.index')
    ->with('success','Company Has Been updated successfully');
    }
    public function show($id)
    {
        $accessories = Accessories::find($id);
        return view('accessories.index');
    }
}
