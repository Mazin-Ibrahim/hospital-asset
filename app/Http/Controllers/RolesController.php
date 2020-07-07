<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;


use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function showRoles()
    {
       return view('authorization.role');
    }


    public function store(Request $request)
    {
    	$role = new Role();

        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description  = 'ok';

    	$role->save();

    	return $role;
    }

    public function index()
    {
    	$roles = Role::all();

        return $roles;
    }


    public function update(Request $request,$id)
    {
    	$role = Role::findOrFail($id);

    	$role->name = $request->name;

        $role->display_name = $request->display_name;

    	$role->description  = 'ok';

    	$role->save();

    	return $role;
    }

      public function giveRole($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('authorization.giveRole',compact('user','roles'));

     }

     public function postGiveRole(Request $request)
     {
         // dd($request->all());
        $user = User::findOrFail($request->user_id);

        $user->syncRoles($request->check);

        return redirect()->route('users.create');
     }


}
