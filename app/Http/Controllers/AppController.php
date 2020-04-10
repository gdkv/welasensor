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
        if (count(Sensor::user()->get())){
            // Show all data from 1 sensor
            $firstSensor = Sensor::user()->first();
            return view('app.index', [
                'sensors' => Sensor::user()->get(), // all User sensors
                'dataSensor' => $firstSensor, // get First sensor Data
                'measure' => $firstSensor->lastData(), // get First sensor 1 LAST measure Data
                'miniChartsData' => [
                    // 20 last measure data for all measurements
                    'temperature' => $firstSensor->sensorData()->pluck('temperature')->take(20)->toArray(),
                    'humidity' => $firstSensor->sensorData()->pluck('humidity')->take(20)->toArray(),
                    'pressure' => $firstSensor->sensorData()->pluck('pressure')->take(20)->toArray(),
                    'lux' => $firstSensor->sensorData()->pluck('lux')->take(20)->toArray(),
                    'decibel' => $firstSensor->sensorData()->pluck('decibel')->take(20)->toArray(),
                    'co2' => $firstSensor->sensorData()->pluck('co')->take(20)->toArray(),
                ],
                // get 100 records (by default temperature)
                'allData' => $firstSensor->sensorData()->pluck('temperature')->take(100)->toArray(),
                'empty' => false,
            ]);
        } else {
            return view('app.index', ['empty' => true, ]);
        }

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
