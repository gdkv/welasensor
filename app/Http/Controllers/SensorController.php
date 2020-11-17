<?php

namespace App\Http\Controllers;

use App\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SensorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified'], ['except' => 'sort']);
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
            return redirect(route('sensors_list'))->with('status', 'Sensor added!');
        }
        return redirect(route('sensors_list'))->with('status', 'Mac address is not valid!');
    }

    public function sort(Request $request)
    {
        // get sensors in right order
        $result = [];
        $orderPrefix = 100;
        $sensorsOrder = $request->input('sensors');

        foreach ($sensorsOrder as $order => $sensorId) {
            $sensor = Sensor::find($sensorId);
            $newPriority = $orderPrefix + $order;
            // $sensor->priority = $order;
            // $sensor->save();
            $result[] = ['id' => $sensor->id, 'order' => $newPriority, ];
        }

        return response()->json(['status' => 'Ok', 'sensors' => $sensorsOrder, 'order' => $result, ]);
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
                'temperature' => $currentSensor->sensorData()->pluck('temperature')->take(-20)->toArray(),
                'humidity' => $currentSensor->sensorData()->pluck('humidity')->take(-20)->toArray(),
                'pressure' => $currentSensor->sensorData()->pluck('pressure')->take(-20)->toArray(),
                'lux' => $currentSensor->sensorData()->pluck('lux')->take(-20)->toArray(),
                'decibel' => $currentSensor->sensorData()->pluck('decibel')->take(-20)->toArray(),
                'co2' => $currentSensor->sensorData()->pluck('co')->take(-20)->toArray(),
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
        $sensorLimitsArray = [];
        $currentSensor = Sensor::findOrFail($id);
        $sensorLimits = $currentSensor->limit()->latest()->first();
        if ($sensorLimits !== null){
            $sensorLimitsArray = $sensorLimits->toArray();
        }
        $validMac = filter_var($request->input('mac'), FILTER_VALIDATE_MAC);
        $sensorName = htmlspecialchars($request->input('name'));
        if ($validMac && $sensorName){
            $currentSensor->mac = $validMac;
            $currentSensor->name = $sensorName;
            // $user->sensor()->save($sensor);
            $currentSensor->save();
        }

        return view('app.sensors.view', ['sensor' => $currentSensor, 'limits' => $sensorLimitsArray,]);
    }

    public function delete(Request $request, $id)
    {
        $currentSensor = Sensor::user()->findOrFail($id);
        if ($currentSensor && $request->input('check') === 'I agree'){
            // Force deleting all related models...
            $currentSensor->forceDelete();
            // return Redirect::route('sensors_list');
            return redirect(route('sensors_list'))->with('status', 'Sensor deleted!');
        } else {
            // print($currentSensor->id);
            // print($request->input('check'));
            // print('Nope');
            return Redirect::route('sensor_view', ['id' => $id]);
        }

    }

    public function measures(Request $request, $id, $type)
    {
        return response()
            ->json(Sensor::findOrFail($id)->sensorData()->pluck($type)->take(-100)->toArray());
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
