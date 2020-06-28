<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Asset;

class CountsController extends Controller
{
    public function userCount()
    {
    	$users = User::count();

    	return view('home')->withUsers($users);
    }

     public function userAsset()
    {
    	$assets = Asset::count();

    	return view('home')->withAsset($assets);
    }
}
