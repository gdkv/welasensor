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
            'humidity' => 34.4,
            'pressure' => 748.9,
            'co' => 0,
            'temperature' => 28.3,
            'lux' => 1,
            'decibel' => -81,
            'created_at' => $date->format('Y-m-d H:i:s'),

        ]);

        DB::table('data')->insert([
            'sensor_mac' => "a0-20-a6-08-92-50",
            'humidity' => 34.3,
            'pressure' => 748.8,
            'co' => 0,
            'temperature' => 27.3,
            'lux' => 0,
            'decibel' => -82,
            'created_at' => $date->format('Y-m-d H:i:s'),
        ]);

    }
}
