<?php

namespace App\Http\Controllers;

use App\Limit;
use App\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LimitController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function add(Request $request, $id)
    {
        // Get post data
        // 'sensor_id', 'humidity', 'pressure', 'co2', 'temperature', 'lux', 'db',
        $currentSensor = Sensor::findOrFail($id);

        if ($currentSensor){
            $limit = new Limit([
                'humidity' => ['max' => $request->input('humidity_max'), 'min' => $request->input('humidity_min')],
                'pressure' => ['max' => $request->input('pressure_max'), 'min' => $request->input('pressure_min')],
                'temperature' => ['max' => $request->input('temperature_max'), 'min' => $request->input('temperature_min')],
                'lux' => ['max' => $request->input('lux_max'), 'min' => $request->input('lux_min')],
                'db' => ['max' => $request->input('db_max'), 'min' => $request->input('db_min')],
                'co2' => ['max' => $request->input('co_max'), 'min' => $request->input('co_min')],
            ]);

            $currentSensor->limit()->save($limit);

            return redirect(route('sensor_view', $id))->with('status', 'Limits added');
        }
        return redirect(route('sensor_view', $id))->with('status', 'Something went wrong');
    }
}
