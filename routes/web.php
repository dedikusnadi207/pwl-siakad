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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('account/profile', 'AccountController@profile');
    Route::post('account/profile', 'AccountController@saveProfile');
    Route::post('account/change-password', 'AccountController@changePassword');

    Route::middleware(['user.type:admin'])->group(function () {
        Route::get('class', 'AppClassController@index');
        Route::post('class', 'AppClassController@save');
        Route::delete('class/{id}', 'AppClassController@destroy');
        Route::get('class/data', 'AppClassController@data');
    });

});

// Route::middleware(['auth:admin'])->group(function () {
//     Route::get('account/profile', 'AccountController@profile');
//     Route::post('account/profile', 'AccountController@saveProfile');
//     Route::post('account/change-password', 'AccountController@changePassword');
// });
