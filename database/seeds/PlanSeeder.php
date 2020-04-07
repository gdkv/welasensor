<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plan')->insert([
            'name' => "Start",
            'description' => "<p>Save 6 month data from sensor</p> <p>Get temperature and humidity</p> <p>Monthly email report and email alerts</p> <p>1 limit</p> <p>3 sensors max</p>",
            'price' => 0,
        ]);
        DB::table('plan')->insert([
            'name' => "Pro",
            'description' => "<p>Save 1 year data from sensor</p> <p>Get temperature, humidity,  pressure, luminosity and noise level</p> <p>Weekly reports, massage alerts</p> <p>5 limits</p> <p>∞ sensors</p>",
            'price' => 6,
        ]);
        DB::table('plan')->insert([
            'name' => "Ultimate",
            'description' => "<p>All your data safe and sound</p> <p>Get temperature, humidity,  pressure, luminosity, noise level and CO<sub>2</sub></p> <p>Weekly reports, massage alerts</p> <p>∞ limits</p> <p>∞ sensors</p>",
            'price' => 16,
        ]);
    }
}
