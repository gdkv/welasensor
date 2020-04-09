<?php

namespace App\Http\Controllers;

use App\Data;
use App\Sensor;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'postData']);
    }

    public function index()
    {
        return view('app.index', [
            'sensors' => Sensor::all(),
            'dataSensor' => Sensor::all()->first(),
            'measure' => Sensor::all()->first()->lastData(),
        ]);
    }

    public function postData(Request $request)
    {
        /**
         * Get data from sensors
         */
        $validMac = filter_var($request->input('mac'), FILTER_VALIDATE_MAC);
        $co2 = $request->input('co2') != 'N/A' ? : 0;

        if ($validMac)
        {
            $data = new Data();
            $data->sensor_mac = $validMac;
            $data->humidity = (float)$request->input('humidity');
            $data->pressure = (float)$request->input('pressure');
            $data->co = $co2;
            $data->temperature = (float)$request->input('temperature');
            $data->lux = (float)$request->input('lux');
            $data->decibel = (float)$request->input('db');

            $data->save();
        }
    }
}
