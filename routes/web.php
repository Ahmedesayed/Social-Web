<?php

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

Route::post('/profileupdate',['uses'=>'profileController@submit','as'=>'profilecontroller']);
Route::post('/profileupdate',['uses'=>'profileController@edit','as'=>'profilecontrolleredit']);


Route::get('/profileview',function(){
    return view('profile');
} );


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
