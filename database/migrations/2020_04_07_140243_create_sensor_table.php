<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->macAddress('mac')->unique();
            $table->unsignedBigInteger('zone_id');
            $table->timestamps();
        });

        Schema::table('sensor', function (Blueprint $table) {
            $table->foreign('zone_id')
                ->references('id')
                ->on('zone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('sensor');
        Schema::enableForeignKeyConstraints();
    }
}
