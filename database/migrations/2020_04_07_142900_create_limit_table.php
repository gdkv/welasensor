<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLimitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('limit', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('sensor_id');

            $table->json('humidity')->nullable();
            $table->json('pressure')->nullable();
            $table->json('co2')->nullable();
            $table->json('temperature')->nullable();
            $table->json('lux')->nullable();
            $table->json('db')->nullable();

        });

        Schema::table('limit', function (Blueprint $table) {
            $table
                ->foreign('sensor_id')
                ->references('id')
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
        Schema::dropIfExists('limit');
    }
}
