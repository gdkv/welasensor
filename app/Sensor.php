<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \DateTime;

class Sensor extends Model
{
    protected $table = 'sensor';

    protected $fillable = [
        'name', 'mac'
    ];

    public function sensorData()
    {
        return $this->hasMany('App\Data', 'sensor_mac', 'mac');
    }

    private function lastDataDate(): DateTime
    {
        $lastData = $this->sensorData()->latest()->first();
        return new DateTime($lastData->created_at);
    }

    public function isOnline(): bool
    {
        $createdAt = $this->lastDataDate();
        $now = new DateTime();
        return $createdAt > $now->modify("-5 minutes");
    }

    public function lastUpdate(): string
    {
        $createdAt = $this->lastDataDate();
        return $createdAt->format('d.m.Y H:i');
    }
}
