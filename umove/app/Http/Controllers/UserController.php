<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

use Spatie\Permission\Models\Role;
use App\Models\User;
use DB;
use Hash;
use Session;
use Spatie\Activitylog\Models\Activity;
use ActivityLogger;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->has('roles');
        if(auth()->user()->id != 1) {
            $data = $data->where('users.id','!=','1');
        }
        $data = $data->get();
        return view('admin.users.index',compact('data'));
            
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::with('permissions')->get();
        return view('admin.users.create',compact('roles'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'tel' => 'required|unique:users,tel',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        if($input['is_agent']) {
            $input['is_agent'] = $request->boolean('is_agent');
        }
        $user = User::create($input);
        
        if($user->assignRole($request->input('roles'))){
            ActivityLogger::activity("The user created. ID: ".$user['id']. ", name: ".$user['name']);
            Session::flash('title','Good Job!');
            Session::flash('message','The user created successfully');
            Session::flash('type','success');
        }else{
            Session::flash('title','Got Issues!');
            Session::flash('message','There is an error. Please try again!');
            Session::flash('type','error');
        }
        return redirect()->route('users.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
       // $roles = Role::pluck('name','name')->all();
        $roles = Role::with('permissions')->get();
        $userRole = $user->roles->pluck('name','id')->all();
        return view('admin.users.edit',compact('user','roles','userRole'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'tel' => 'required|unique:users,tel,'.$id,
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
        if(isset($input['is_agent'])) {
            $input['is_agent'] = $request->boolean('is_agent');
        } else if($user['is_agent'] == 1) {
            $input['is_agent'] = 0;
        }
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        if($user->assignRole($request->input('roles'))){
            ActivityLogger::activity("The user updated. ID: ".$user['id']. ", name: ".$user['name']);
            Session::flash('title','Good Job!');
            Session::flash('message','The user updated successfully');
            Session::flash('type','success');
        }else{
            Session::flash('title','Got Issues!');
            Session::flash('message','There is an error. Please try again!');
            Session::flash('type','error');
        }
        return redirect()->route('users.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user->delete()){
            ActivityLogger::activity("The user deleted. ID: ".$user['id'].", name: ".$user['name']);
            Session::flash('title','Good Job!');
            Session::flash('message','The user deleted successfully');
            Session::flash('type','success');
        }else{
            Session::flash('title','Got Issues!');
            Session::flash('message','There is an error. Please try again!');
            Session::flash('type','error');
        }
        return redirect()->route('users.index');
    }

    public function reset($id)
    {
        $user = User::findOrFail($id);
        $input['password'] = Hash::make('12345678');
        if($user->fill($input)->save()){
            ActivityLogger::activity("The user password was reset. ID: ".$user['id'].", name: ".$user['name']);
            Session::flash('title','Well Done!');
            Session::flash('message','User password has been changed as 12345678 which email is '.$user['name']);
            Session::flash('type','success');
            return redirect()->route('users.index');
        }else{
            Session::flash('title','Got Issues!');
            Session::flash('message','There is an error. Please try again!');
            Session::flash('type','error');
            return back();
        }
    }
   
}
