<?php

namespace App\Http\Controllers;

use App\Data;
use App\Limit;
use App\Sensor;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\Auth;
class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified'], ['except' => 'postData']);
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
                'type' => 'temperature',
                'typeColor' => 'rgba(252, 92, 125, 1)',
                'empty' => false,
            ]);
        } else {
            return view('app.index', ['empty' => true, ]);
        }

    }

    public function postData(Request $request)
    {
        /**
         * @todo Use it as Job!
         * Get data from sensors
         */
        $validMac = filter_var($request->input('mac'), FILTER_VALIDATE_MAC);
        $co2 = $request->input('co2') != 'N/A' ? $request->input('co2') : 0;

        if ($validMac)
        {
            $alerts = [];
            $sensor = Sensor::mac($validMac)->get()->first();
            $limits = Limit::sensor($sensor->id)->get()->last();
            $user = Auth::user();
            $data = new Data();

            $data->sensor_mac = $validMac;

            if ($request->input('humidity')) {
                $data->humidity = (float)$request->input('humidity');
                if (isset($limits->humidity['max'])) {
                    if ($data->humidity > (float)$limits->humidity['max']) {
                        $alerts[] = ['limit' => 'max', 'type' => 'humidity', 'set' => (float)$limits->humidity['max'], 'get' => $data->humidity, ];
                    }
                }
                if (isset($limits->humidity['min'])) {
                    if ($data->humidity < (float)$limits->humidity['min']) {
                        $alerts[] = ['limit' => 'min', 'type' => 'humidity', 'set' => (float)$limits->humidity['min'], 'get' => $data->humidity, ];
                    }
                }
            }

            if ((float)$request->input('temperature')) {
                $data->temperature = (float)$request->input('temperature');
                if (isset($limits->temperature['max'])) {
                    if ($data->temperature > (float)$limits->temperature['max']) {
                        $alerts[] = ['limit' => 'max', 'type' => 'temperature', 'set' => (float)$limits->temperature['max'], 'get' => $data->temperature, ];
                    }
                }
                if (isset($limits->temperature['min'])) {
                    if ($data->temperature < (float)$limits->temperature['min']) {
                        $alerts[] = ['limit' => 'min', 'type' => 'temperature', 'set' => (float)$limits->temperature['min'], 'get' => $data->temperature, ];
                    }
                }
            }

            $data->pressure = (float)$request->input('pressure');
            $data->co = $co2;
            $data->lux = (float)$request->input('lux');
            $data->decibel = (float)$request->input('db');

            $data->save();

            if (isset($user->telegram) && count($alerts)) {
                $text = "*New Limit Alert from Kitchen Sensor*\n\n";
                foreach ($alerts as $alert) {
                    $text .= "Your {$sensor->name} sensor get value *{$alert['get']}* but your {$alert['limit']} limit set {$alert['set']}\n";
                }
                $text .= "\nYou can see graph https://welasensor\.ru/app";
                Telegram::sendMessage([
                    'chat_id' => $user->telegram,
                    'parse_mode' => 'MarkdownV2',
                    'text' => $text
                ]);
            }
        }
    }

    public function settings(Request $request)
    {
        if ($request->input('co2') ) {
            // Save Post data
        }

        return view('app.settings', ['empty' => true, ]);
    }

    public function reports(Request $request)
    {
        if ($request->input('co2') ) {
            // Save Post data
        }

        return view('app.reports', ['empty' => true, ]);
    }

    public function notify(Request $request)
    {
        if ($request->input('co2') ) {
            // Save Post data
        }

        return view('app.notify', ['empty' => true, ]);
    }
}
