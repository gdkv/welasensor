<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';

    protected $fillable = [
        'sensor_mac', 'humidity', 'pressure', 'co', 'temperature', 'lux', 'decibel',
    ];

}
