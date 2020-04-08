<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensorType extends Model
{
    protected $table = 'sensor_type';

    protected $fillable = [
        'name', 'description', 'price', 'isBig',
    ];
}
