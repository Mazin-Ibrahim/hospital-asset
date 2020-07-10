<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Requests\UsersRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return $users;
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {

         // dd($request->all());
        $user = new User();

        $user->name = $request->name;

        $user->email  = $request->email;
         if(is_null($request->hospital_id)){
        
        $user->hospital_id = auth()->user()->hospital_id;
         }
         else{
           $user->hospital_id = $request->hospital_id; 
        }

        $user->password = Hash::make($request->password);

        $user->save();

        return response()->json(['content' => $user, 'state' => 200]);
    }

    

   
    public function update(UsersRequest $request, $id)
    {
        
        $user = User::findOrFail($id);

        $user->name = $request->name;

        $user->email  = $request->email;

         if(is_null($request->hospital_id)){
        
        $user->hospital_id = auth()->user()->hospital_id;
         }
         else{
           $user->hospital_id = $request->hospital_id; 
        }

        $user->password = Hash::make($request->password);

        $user->save();

      return response()->json(['content' => $user, 'state' => 200]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
