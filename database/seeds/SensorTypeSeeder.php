<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SensorTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sensor_type')->insert([
            'name' => "Basic",
            'description' => "<p>A small Welasensor the size of a matchbox, which can be connected anywhere in the house where there is a charger, and it is also compatible with work from powerbank.</p><p>Get temperature, humidity,  pressure, luminosity, noise level</p><p>You can choose corpuse material from plastic or wood</p><p>Free cloud web application</p>",
            'price' => 39,
            'isBig' => 1,
        ]);
        DB::table('sensor_type')->insert([
            'name' => "CO2",
            'description' => "<p class='red'>All in basic</p> <p>Get CO2 level</p> <p>You can choose corpus material from plastic, wood and waterproof metal for outside use</p>",
            'price' => 49,
            'isBig' => 0,
        ]);
    }
}
