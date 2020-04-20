<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Limit extends Model
{
    protected $table = 'limit';

    protected $fillable = [
        'sensor_id', 'humidity', 'pressure', 'co2', 'temperature', 'lux', 'db',
    ];
}
