<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DataTables;
use DB;
use Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // $data = User::get();
        //     return Datatables::of($data)
        //         ->addColumn('action','rooms.actions')
        //         ->toJson();
        // dd($data);
        if (request()->ajax()) {
            $data = User::get();
            return DataTables::of($data)
                ->addColumn('role', function(User $data){
                    foreach ($data as $user) {
                        foreach ($data->getRoleNames() as $role) {
                            return  $role;
                        }
                    }
                })
                ->addColumn('action','users.actions')
                ->toJson();
        }
        return view('users.index');
    }
    
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|same:confirm-password',
        //     'roles' => 'required'
        // ]);
    
        if (($request->staff_img)) {
            $image = $request->file('staff_img');
            $upload = 'img/staff/';
            $filename = time().$image->getClientOriginalName();
            $path = move_uploaded_file($image->getPathName(), $upload. $filename);
        } else{
            $filename = null;
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['staff_img'] = $filename;
        
        $role = $request->role[0];
        // dd($role);
        $user = User::create($input);
        $user->assignRole($role);
    
        return redirect()->route('users.index')
            ->with('success','User created successfully');
    }
    
    // public function show($id)
    // {
    //     // dd($id);
    //     $user = User::find($id);
    //     return view('users.show',compact('user'));
    // }
    
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('users.edit',compact('user','roles','userRole'));
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
            ->with('success','User updated successfully');
    }
    public function destroy($id)
    {
        dd($id);
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success','User deleted successfully');
    }
    // public function getUser($id)
    // {
    //     dd($id);
    //     User::find($id)->delete();
    //     return redirect()->route('users.index')
    //         ->with('success','User deleted successfully');
    // }

}
