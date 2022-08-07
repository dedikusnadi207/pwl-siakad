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
        Route::get('faculty', 'FacultyController@index');
        Route::post('faculty', 'FacultyController@save');
        Route::delete('faculty/{id}', 'FacultyController@destroy');
        Route::get('faculty/data', 'FacultyController@data');

        Route::get('study-program', 'StudyProgramController@index');
        Route::post('study-program', 'StudyProgramController@save');
        Route::delete('study-program/{id}', 'StudyProgramController@destroy');
        Route::get('study-program/data', 'StudyProgramController@data');

        Route::get('course', 'CourseController@index');
        Route::post('course', 'CourseController@save');
        Route::delete('course/{id}', 'CourseController@destroy');
        Route::get('course/data', 'CourseController@data');

        Route::get('class', 'AppClassController@index');
        Route::post('class', 'AppClassController@save');
        Route::delete('class/{id}', 'AppClassController@destroy');
        Route::get('class/data', 'AppClassController@data');

        Route::get('admin', 'AdminController@index');
        Route::post('admin', 'AdminController@save');
        Route::delete('admin/{id}', 'AdminController@destroy');
        Route::get('admin/data', 'AdminController@data');

        Route::get('lecturer', 'LecturerController@index');
        Route::post('lecturer', 'LecturerController@save');
        Route::delete('lecturer/{id}', 'LecturerController@destroy');
        Route::get('lecturer/data', 'LecturerController@data');
    });

});

// Route::middleware(['auth:admin'])->group(function () {
//     Route::get('account/profile', 'AccountController@profile');
//     Route::post('account/profile', 'AccountController@saveProfile');
//     Route::post('account/change-password', 'AccountController@changePassword');
// });
