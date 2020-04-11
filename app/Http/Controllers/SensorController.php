<?php

namespace App\Http\Controllers;

use App\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SensorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
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

    public function data(Request $request, $id, $type)
    {
        // Current sensor data
        $currentSensor = Sensor::findOrFail($id);
        return view('app.index', [
            'sensors' => Sensor::user()->get(),
            'dataSensor' => $currentSensor,
            'measure' => $currentSensor->lastData(),
            'miniChartsData' => [
                // 20 last measure data for all measurements
                'temperature' => $currentSensor->sensorData()->pluck('temperature')->take(20)->toArray(),
                'humidity' => $currentSensor->sensorData()->pluck('humidity')->take(20)->toArray(),
                'pressure' => $currentSensor->sensorData()->pluck('pressure')->take(20)->toArray(),
                'lux' => $currentSensor->sensorData()->pluck('lux')->take(20)->toArray(),
                'decibel' => $currentSensor->sensorData()->pluck('decibel')->take(20)->toArray(),
                'co2' => $currentSensor->sensorData()->pluck('co')->take(20)->toArray(),
            ],
            // get 100 records (by default temperature)
            'type' => $type ?: 'temperature',
            'typeColor' => $this->getColorByType($type),
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

    public function measures(Request $request, $id, $type)
    {
        return response()
            ->json(Sensor::findOrFail($id)->sensorData()->pluck($type)->take(2000)->toArray());
    }

    private function getColorByType($type): string
    {
        switch ($type){
            case "humidity":
                $color = "rgba(255, 188, 66, 1)";
                break;
            case "lux":
                $color = "rgba(48, 169, 222, 1)";
                break;
            case "decibel":
                $color = "rgba(108, 73, 184, 1)";
                break;
            case "pressure":
                $color = "rgba(103, 213, 181, 1)";
                break;
            default:
                $color = "rgba(252, 92, 125, 1)";
                break;
        }
        return $color;
    }
}
