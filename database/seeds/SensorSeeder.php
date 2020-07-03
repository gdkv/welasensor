<?php

use Illuminate\Database\Seeder;

class SensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sensor')->insert([
            'name' => "Hall",
            'mac' => "a0-20-a6-11-b9-f3",
            'user_id' => 1,
        ]);

        DB::table('sensor')->insert([
            'name' => "Kitchen",
            'mac' => "a0-20-a6-08-92-50",
            'user_id' => 1,
        ]);
    }
}
