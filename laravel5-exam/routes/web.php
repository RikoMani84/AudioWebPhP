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

Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/message', function () {
        return view('message');
    });
    Route::get('/role-register', 'Admin\DashboardController@registered');

    // users
    Route::get('/role-edit/{id}', 'Admin\DashboardController@registerededit');
    Route::put('/role-register-update/{id}', 'Admin\DashboardController@registeredupdate');
    Route::delete('/role-delete/{id}', 'Admin\DashboardController@registereddelete');


    // audio
    Route::get('/sounds', 'Admin\DashboardController@audio');
    Route::delete('/delete/{id}', 'Admin\DashboardController@audiodelete');

    Route::get('/edit/{id}', 'Admin\DashboardController@editAudio');
    Route::put('/audio-update/{id}', 'Admin\DashboardController@audioUpdate');

    Route::get('/create-audio', 'Admin\DashboardController@create');
    Route::any('/audio-upload', 'Admin\DashboardController@audioupload');
});


//user
Route::group(['middleware' => ['auth', 'user']], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/user_audio', 'AudioController@show')->name('user_audio');
    Route::get('/download/{id}', 'AudioController@download');
    Route::get('/complaint/{id}', 'AudioController@complaint');
    Route::any('/complaint_send/{id}', 'AudioController@complaint_send');
});
