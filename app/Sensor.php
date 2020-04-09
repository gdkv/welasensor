<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \DateTime;
use Illuminate\Support\Facades\Auth;

class Sensor extends Model
{
    protected $table = 'sensor';

    protected $fillable = [
        'name', 'mac'
    ];

    public function scopeUser($query)
    {
        $user = Auth::user();
        return $query->where('user_id', $user->id);
    }

    public function sensorData()
    {
        return $this->hasMany('App\Data', 'sensor_mac', 'mac');
    }

    public function lastData()
    {
        if(!is_null($this->sensorData())){
            return $this->sensorData()->latest()->first();
        }
        return null;
    }

    /**
     * @return DateTime|null
     * @throws \Exception
     */
    private function lastDataDate()
    {
        $lastData = $this->lastData();
        if (isset($lastData)){
            return $lastData->created_at;
        }
        return null;
    }

    public function isOnline(): bool
    {
        $createdAt = $this->lastDataDate();
        if (!is_null($createdAt)){
            $now = new DateTime();
            $createdAt = new DateTime($createdAt);
            return $createdAt > $now->modify("-5 minutes");
        }
        return false;
    }

    public function lastUpdate(): string
    {
        $createdAt = $this->lastDataDate();
        if (!is_null($createdAt)) {
            return 'Update ' . $createdAt->diffForHumans();
        }
        return 'Data has not received yet';
    }
}
