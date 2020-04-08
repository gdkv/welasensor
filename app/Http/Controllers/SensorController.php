<?php

namespace App\Http\Controllers;

use App\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('app.sensors.list', ['sensors' => Sensor::all(),]);
    }

    public function add()
    {
        // Get post data
    }

    public function view()
    {
        return view('app.sensors.view');
    }

}
