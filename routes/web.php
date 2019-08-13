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
//register form
Route::post('/welcome', 'ContestController@store')->name('user.register');
//Admin
Route::group(['middleware' => ['auth', 'isAdmin']], function () { 
    Route::get('/admin', 'HomeController@index')->name('admin.home');
    Route::any('/admin/all-contestants', 'HomeController@allContestants')->name('admin.all-contestants'); 
    Route::any('/admin/registered', 'HomeController@registeredContestants')->name('admin.registered');
    Route::get('/admin/{id}/couple', 'HomeController@viewContestantProfile')->name('admin.registered.couple');  
});