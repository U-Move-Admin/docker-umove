<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Arr;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use DB;
use Hash;
class PermissionController extends Controller
{
    public function __construct() {

        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','store']]);
        $this->middleware('permission:permission-create', ['only' => ['create','store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);

        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all(); //Get all permissions

        return view('admin.permissions.index')->with('permissions', $permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::get(); //Get all roles

        return view('admin.permissions.create')->with('roles', $roles);
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
            'name'=>'required|max:40',
        ]);

        $name = $request['name'];
        $permission = new Permission();
        $permission->name = $name;

        $roles = $request['roles'];

        $permission->save();

        if (!empty($request['roles'])) { //If one or more role is selected
            foreach ($roles as $role) {
                $r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record

                $permission = Permission::where('name', '=', $name)->first(); //Match input //permission to db record
                $r->givePermissionTo($permission);
            }
        }

        return redirect()->route('admin.permissions.index')->with('flash_message','Permission'. $permission->name.' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('permissions');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        $roles = Role::get();
        return view('admin.permissions.edit', compact('permission','roles'));
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
        $permission = Permission::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);
        $input = $request->all();
        $permission->fill($input)->save();

        return redirect()->route('permissions.index')
            ->with('flash_message',
             'Permission'. $permission->name.' updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);

        //Make it impossible to delete this specific permission
        if ($permission->name == "Administer roles & permissions") {
            return redirect()->route('permissions.index')
            ->with('flash_message',
             'Cannot delete this Permission!');
        }

        $permission->delete();

        return redirect()->route('admin.permissions.index')
            ->with('flash_message',
             'Permission deleted!');

    }
    public function check()
    {
        // route eklencek

        $controllers = [];
        $currentAction = \Route::currentRouteAction();
        //dd(\Route::getRoutes()->getRoutesByName());
        //getRoutesByName()
        //dd($currentAction);
        $permissions = Permission::all();
        $permissions = $permissions->pluck('name')->toArray();
        //dd($permissions);
        $controllers = [];

        foreach (\Route::getRoutes()->getRoutes() as $route)
        {
            $action = $route->getAction();

            if (array_key_exists('controller', $action))
            {
                // You can also use explode('@', $action['controller']); here
                // to separate the class name from the method
                //$a = explode('@',$action['controller']);

                //$controllers[] = array('controllers'=>str_replace('App\Http\Controllers\\', '', $a['0']));
                $controllers[] = $action['controller'];
            }
        }
        $is_active = '';
        //dd($controllers);

        return view('admin.permissions.check', compact('controllers','permissions','is_active'));
    }
    public function add_checked(Request $request)
    {
        $permissions = Permission::all()->pluck('name')->toArray();

        $input = $request->all();
        foreach ($input['my_multi_select1'] as $key => $value) {
            if(!in_array($value,$permissions)){
                $permission = new Permission();
                $permission->name = $value;
                $permission->save();
            }
        }
        return redirect()->route('admin.permissions.index')->with('flash_message','Permissions added!');

    }
}
