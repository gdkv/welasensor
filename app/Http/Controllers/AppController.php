<?php

namespace App\Http\Controllers;

use App\Data;
use App\Limit;
use App\Sensor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Telegram\Bot\Laravel\Facades\Telegram;
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
        $alerts = [];
        $validMac = filter_var($request->input('mac'), FILTER_VALIDATE_MAC);
        $co2 = $request->input('co2') != 'N/A' ? $request->input('co2') : 0;

        if ($validMac)
        {
            $sensor = Sensor::mac($validMac)->get()->first();
            $limits = Limit::sensor($sensor->id)->get()->last();
            $user = User::find($sensor->user_id);
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
                    $get = number_format($alert['get'], 2, "\.", " ");
                    $set = number_format($alert['set'], 2, "\.", " ");

                    $text .= "Your {$sensor->name} sensor get value *{$get}* but your {$alert['limit']} limit set *{$set}*\n";
                }
                $text .= "\nYou can see [in app graph](https://welasensor.ru/app)";
                Telegram::sendMessage([
                    'chat_id' => $user->telegram,
                    'parse_mode' => 'MarkdownV2',
                    'text' => $text
                ]);
            }
        }

        // return response()->json([
        //     'alerts' => $alerts,
        //     // 'tg' => $user->telegram,
        //     'sensor' => [
        //         'id' => $sensor->id,
        //         'name' => $sensor->name,
        //     ],
        //     // 'text' => $text
        // ]);
    }

    public function settings(Request $request)
    {
        $user = Auth::user();

        if ($request->input('theme') !== null) {
            $user->darkTheme = (int)$request->input('theme');
        }

        if ($request->input('name') ||
            $request->input('lang') ||
            $request->input('plan')
        ) {
            // Save Post data
            $user->name = ($request->input('name') ? : $user->name);
            $user->lang = ($request->input('lang') ? : $user->lang);
            $user->plan_id = ($request->input('plan') ? (int)$request->input('plan') : $user->plan_id);
        }

        $user->save();

        return view('app.settings', [
            'user' => $user,
            // 'answer' => json_encode($request->all()),
        ]);
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
        $user = Auth::user();
        if ($request->input('is-reported') !== null) {
            $user->isReported = (int)$request->input('is-reported');
        }

        if ($request->input('is-alerted') !== null) {
            $user->isAlerted = (int)$request->input('is-alerted');
        }

        if ($request->input('report-email') ||
            $request->input('telegram') ||
            $request->input('alert-email')
        ) {
            // Save Post data
            $user->reportEmail = ($request->input('report-email') ? : $user->reportEmail);
            $user->telegram = ($request->input('telegram') ? : $user->telegram);
            $user->alertEmail = ($request->input('alert-email') ? : $user->alertEmail);
        }

        $user->save();

        return view('app.notify', ['user' => $user, ]);
    }
}
