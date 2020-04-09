<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Auth

Auth::routes();

Route::get('/login', function () {
    return view('main.index');
})->name('login');

Route::get('/register', function () {
    return view('main.index');
})->name('register');

Route::get('/logout', function (){
    Auth::logout();
    return redirect('/');
})->name('logout');


// Main

Route::get('/', 'HomeController@index')->name('home');

Route::get('/buy', 'HomeController@buy')->name('buy');

Route::get('/about', function () {
    return view('main.about');
});

Route::get('/how-to', function () {
    return view('main.howto');
});

Route::get('/downloads', function () {
    return view('main.downloads');
});


// App

Route::prefix('app')->group(function () {

    Route::prefix('sensor')->group(function () {
        Route::post('/add', 'SensorController@add')->name('sensor_add');
        Route::get('/data/{id}', 'SensorController@data')->name('sensor_data');
        Route::get('/{id}', 'SensorController@view')->name('sensor_view');
        Route::get('/', 'SensorController@index')->name('sensors_list');
    });

    Route::get('/', 'AppController@index')->name('app');

    Route::post('/post', 'AppController@postData');
});
