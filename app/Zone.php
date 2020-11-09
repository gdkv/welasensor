<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Auth;

class Zone extends Model
{
    protected $table = 'zone';

    protected $fillable = [
        'name', 'description',
    ];

    public function scopeUser($query)
    {
        $user = Auth::user();
        return $query->where('user_id', $user->id);
    }
}
