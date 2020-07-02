<?php

use Illuminate\Support\Facades\Route;
use App\Transaction;
use App\Asset;
use App\User;
use App\Events\AssetDangerLevel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('/ui', 'ui.index');






// ---------------------Asset-------------------------------

Route::resource('assets','AssetsController')->only(['create', 'update','store','index']);





// -----------------User-------------------------------------

Route::resource('users','UsersController')->only(['create', 'update','store','index']);




//-------------------transaction----------------------------------

Route::post('/transactions/{id}','TransactionsController@store');

Route::get('/show/asset/{id}','TransactionsController@show');



// Route::get('/test',function(){

// 	$users = User::all();
// 	$assets = Asset::all();

// 	$asset_array = [];
// 	$user_array  = [];

// 	foreach ($assets as $key => $asset) {
// 		if($asset->dengar_level <= $asset->stock){

// 		 array_push($asset_array, $asset->name);

// 		}
// 	}

// 	// dd($user_array);

// 	foreach ($users as $key => $user) {
// 		array_push($user_array, $user->email);
// 	}

//    event (new AssetDangerLevel($asset_array,$user_array));

// });