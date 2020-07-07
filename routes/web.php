<?php

use Illuminate\Support\Facades\Route;
use App\mazin;




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


//-----------------------------Role----------------------------------


Route::get('/roles','RolesController@showRoles')->name('roles');
Route::post('/roles/store','RolesController@store');
Route::get('/roles/index','RolesController@index');
Route::post('/roles/update/{id}','RolesController@update');


// ---------------------- Give Role-----------------------------

Route::get('/give/role/{id}','RolesController@giveRole');
Route::post('/postGiveRole','RolesController@postGiveRole')->name('postGiveRole');






//---------------------------Permissions------------------------------


Route::get('/permissions','PermissionsController@showPermissions');
Route::post('/permissions/store','PermissionsController@store');
Route::get('/permissions/index','PermissionsController@index');
Route::post('/permissions/update/{id}','PermissionsController@update');

// ---------------------- Give Permission-----------------------------

Route::get('/give/permission/{id}','PermissionsController@givePermission');
Route::post('/postGivePermission','PermissionsController@postGivePermission')->name('postGivePermission');


Route::get('/hasRoleDoctor','CheckUserController@checkRoleDoctors');
Route::get('/hasRoleAdministrator','CheckUserController@checkRoleAdministrator');


Route::get('/test',function(){
  
});