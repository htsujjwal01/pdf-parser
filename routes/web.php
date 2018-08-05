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

Route::get('/hello', function () {
    return view('welcome');
});


// Auth::routes();
// Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group([], function(){

    // Login form for Admin Panel
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

    // Login for Admin Panel
    Route::post('login', 'Auth\LoginController@login');


    // HACK: for easier logout control...
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');


	Route::get('/', 'HomeController@index')->name('home');
});