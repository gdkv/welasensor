<?php

namespace App\Http\Controllers;

use App\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SensorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('app.sensors.list', [
            'sensors' => Sensor::user()->get(),
        ]);
    }

    public function add(Request $request)
    {
        // Get post data
        $validMac = filter_var($request->input('mac'), FILTER_VALIDATE_MAC);
        $sensorName = htmlspecialchars($request->input('name'));
        $user = Auth::user();
        if ($validMac && $sensorName){
            $sensor = new Sensor([
                'mac' => $validMac,
                'name' => $sensorName,
            ]);

            $user->sensor()->save($sensor);
        }
        return redirect(route('sensors_list'));
    }

    public function data(Request $request, $id)
    {
        /**
         * Все данные от датчика
         */
        return view('app.index', [
            'sensors' => Sensor::user(),
            'dataSensor' => Sensor::findOrFail($id),
            'measure' => Sensor::findOrFail($id)->lastData(),
            'temperatureData' => Sensor::findOrFail($id)->data()->pluck('temperature')->take(20),
            'empty' => false,
        ]);
    }

    public function view(Request $request, $id)
    {
        /**
         * Настройки сенсора
         */
        return view('app.sensors.view', ['sensor' => Sensor::findOrFail($id),]);
    }

}
