<?php

use App\Blacklist;
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
    $blacklist = Blacklist::all();
    return view('welcome')->with('blacklist', $blacklist);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('blacklist', "BlacklistController");
Route::get('blacklist/showall/{blacklist}', "BlacklistController@showall")->name('blacklist.showall');
Route::post('blacklist/find', "BlacklistController@findIdentityBank")->name('blacklist.findIdentityBank');
Route::get('auth/steam', 'AuthController@redirectToSteam')->name('auth.steam');
Route::get('auth/steam/handle', 'AuthController@handle')->name('auth.steam.handle');
