<?php

namespace App\Http\Controllers;

use App\Sensor;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('app.index', ['sensors' => Sensor::all()]);
    }
}
