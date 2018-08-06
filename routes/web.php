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

// Auth::routes();
// Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group([], function(){

    // To show Login form for Dashboard
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

    // To post data for Login for Dashboard
    Route::post('login', 'Auth\LoginController@login');

    // For logout Control
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

     /*
    |--------------------------------------------------------------------------
    | Authenticated Routes...
    |--------------------------------------------------------------------------
    */
    Route::group(['middleware' => 'auth'], function () {

        Route::get('/', 'UploadController@index')->name('uploadPDF');
		Route::post('/', 'UploadController@uploadPDF');

	});

});