<?php

namespace App\Http\Controllers;

use App\Plan;
use App\SensorType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('main.index', ['plans' => Plan::all()]);
    }

    public function buy()
    {
        return view('main.buy', ['sensors' => SensorType::all()]);
    }
}
