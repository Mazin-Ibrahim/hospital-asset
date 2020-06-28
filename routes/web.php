<?php

use Illuminate\Support\Facades\Route;
use App\Transaction;

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

Route::resource('assets','AssetsController');





// -----------------User-------------------------------------

Route::resource('users','UsersController');




//-------------------transaction----------------------------------

Route::post('/transactions/{id}','TransactionsController@toStock');

Route::get('/trace/asset/{id}','TransactionsController@traceAsset');



// Route::get('/test/{id}',function($id){

//  $trans = Transaction::where('asset_id',$id)->get();

//  $mazin = array();

//  foreach ($trans as $key => $t) {
//  	array_push($mazin, $t->user->name);
//  }

//  dd($mazin);
// });