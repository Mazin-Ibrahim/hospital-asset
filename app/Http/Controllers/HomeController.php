<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Asset;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::count();
        $assets = Asset::count();

        return view('home')->withUsers($users)->withAssets($assets);
    }
}