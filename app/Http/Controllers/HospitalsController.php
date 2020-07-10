<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;

class HospitalsController extends Controller
{
    public function showHospital()
    {
    	return view('hospital.hospital');
    }


    public function index()
    {
    	return Hospital::all();
    }

    public function store(Request $request)
    {
    	$hospital = new Hospital();
          
    	$hospital->name = $request->name;
    	$hospital->location = $request->location;

    	$hospital->save();

    	return $hospital;
    }

    public function update(Request $request,$id)
    {
    	$hospital = Hospital::findOrFail($id);

    	$hospital->name = $request->name;
    	$hospital->location = $request->location;

    	$hospital->save();

    	return $hospital;
    }
}
