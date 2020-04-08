<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColomnsInSensorType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sensor_type', function (Blueprint $table) {
            $table->renameColumn('title', 'name');
            $table->renameColumn('text', 'description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sensor_type', function (Blueprint $table) {
            $table->renameColumn('name', 'title');
            $table->renameColumn('description', 'text');
        });
    }
}
