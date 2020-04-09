<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->unsignedBigInteger('plan_id');
            $table->string('telegram')->nullable();
            $table->date('subscription_at')->nullable();

            $table
                ->foreign('plan_id')
                ->references('id')
                ->on('plan')
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('plan_id');
            $table->dropColumn('telegram');
            $table->dropColumn('subscription_at');
        });
    }
}
