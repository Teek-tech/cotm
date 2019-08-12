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

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin.home');
//Route::post('/welcome', 'ContestController@index');
Route::post('/welcome', 'ContestController@store')->name('user.register');

Route::group(['middleware' => ['isAdmin', 'auth']], function () { 

});