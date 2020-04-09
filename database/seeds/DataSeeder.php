<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $date = new DateTime();

        DB::table('data')->insert([
            'sensor_mac' => "a0-20-a6-11-b9-f3",
            'humidity' => 22.5,
            'pressure' => 746.2,
            'co' => 0,
            'temperature' => 27.1,
            'lux' => 6,
            'decibel' => -80,
            'created_at' => $date->format('Y-m-d H:i:s'),

        ]);

        DB::table('data')->insert([
            'sensor_mac' => "a0-20-a6-08-92-50",
            'humidity' => 27.5,
            'pressure' => 746.1,
            'co' => 0,
            'temperature' => 24.4,
            'lux' => 24,
            'decibel' => -81,
            'created_at' => $date->format('Y-m-d H:i:s'),
        ]);

    }
}
