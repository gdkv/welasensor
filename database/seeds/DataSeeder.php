<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data')->insert([
            'sensor_mac' => "a0-20-a6-11-b9-f3",
            'humidity' => 21.7,
            'pressure' => 749.0,
            'co' => 0,
            'temperature' => 24.7,
            'lux' => 1,
            'decibel' => -81,
        ]);

        DB::table('data')->insert([
            'sensor_mac' => "a0-20-a6-11-b9-f3",
            'humidity' => 20.9,
            'pressure' => 748.9,
            'co' => 0,
            'temperature' => 24.6,
            'lux' => 1,
            'decibel' => -82,
        ]);

        DB::table('data')->insert([
            'sensor_mac' => "a0-20-a6-08-92-50",
            'humidity' => 27.7,
            'pressure' => 748.7,
            'co' => 0,
            'temperature' => 26.1,
            'lux' => 0,
            'decibel' => -76,
        ]);
    }
}
