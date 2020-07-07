<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Permission;
use App\Role;

class PermissionsController extends Controller
{
    public function showpermissions()
    {
       return view('authorization.permission');
    }


    public function store(Request $request)
    {
    	$permission = new Permission();

    	$permission->name = $request->name;
    	$permission->display_name = $request->display_name;
        $permission->description  = 'ok';

    	$permission->save();

    	return $permission;
    }

    public function index()
    {
    	return Permission::all();
    }


    public function update(Request $request,$id)
    {
    	$permission = Permission::findOrFail($id);

    	$permission->name = $request->name;

    	$permission->display_name = $request->display_name;
        
        $permission->description  = 'ok';

    	$permission->save();

    	return $permission;
    }

    public function givePermission($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('authorization.givePermission',compact('role','permissions'));

     }

     public function postGivePermission(Request $request)
     {
         // dd($request->all());
        $role = Role::findOrFail($request->role_id);

        $role->syncPermissions($request->check);

        return redirect()->route('roles');
     }
}
