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

Auth::routes(['verify' => true]);

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
        // routes for json data
        Route::get('/json/{id}/temperature', 'SensorController@measures')->defaults('type', 'temperature')->name('sensor_temperature_measures');
        Route::get('/json/{id}/humidity', 'SensorController@measures')->defaults('type', 'humidity')->name('sensor_humidity_measures');
        Route::get('/json/{id}/pressure', 'SensorController@measures')->defaults('type', 'pressure')->name('sensor_pressure_measures');
        Route::get('/json/{id}/decibel', 'SensorController@measures')->defaults('type', 'decibel')->name('sensor_decibel_measures');
        Route::get('/json/{id}/lux', 'SensorController@measures')->defaults('type', 'lux')->name('sensor_lux_measures');
        Route::get('/json/{id}/co2', 'SensorController@measures')->defaults('type', 'co2')->name('sensor_co2_measures');
        // routes for view data
        Route::get('/data/{id}/temperature', 'SensorController@data')->defaults('type', 'temperature')->name('sensor_temperature');
        Route::get('/data/{id}/humidity', 'SensorController@data')->defaults('type', 'humidity')->name('sensor_humidity');
        Route::get('/data/{id}/pressure', 'SensorController@data')->defaults('type', 'pressure')->name('sensor_pressure');
        Route::get('/data/{id}/decibel', 'SensorController@data')->defaults('type', 'decibel')->name('sensor_decibel');
        Route::get('/data/{id}/lux', 'SensorController@data')->defaults('type', 'lux')->name('sensor_lux');
        Route::get('/data/{id}/co2', 'SensorController@data')->defaults('type', 'co2')->name('sensor_co2');

        Route::get('/data/{id}', 'SensorController@data')->defaults('type', '')->name('sensor_data');

        Route::post('/delete/{id}', 'SensorController@delete')->name('sensor_delete');
        Route::post('/add', 'SensorController@add')->name('sensor_add');
        Route::any('/{id}', 'SensorController@view')->name('sensor_view');
        Route::get('/', 'SensorController@index')->name('sensors_list');
    });

    Route::post('/limits/{id}', 'LimitController@add')->name('limits');
    Route::any('/settings', 'AppController@settings')->name('settings');
    Route::post('/post', 'AppController@postData');

    Route::get('/', 'AppController@index')->name('app');

});
