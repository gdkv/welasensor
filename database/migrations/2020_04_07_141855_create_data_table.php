<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->macAddress('sensor_mac');
            $table->float('humidity');
            $table->float('pressure');
            $table->float('co');
            $table->float('temperature');
            $table->float('lux');
            $table->float('decibel');
            $table->timestamps();

        });

        Schema::table('data', function (Blueprint $table) {
            $table
                ->foreign('sensor_mac')
                ->references('mac')
                ->on('sensor')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
}
