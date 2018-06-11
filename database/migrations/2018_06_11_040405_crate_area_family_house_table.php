<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateAreaFamilyHouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_family_house', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('g_information_id');
            $table->integer('ground_floor_length')->nullable();
            $table->integer('ground_floor_width')->nullable();
            $table->integer('ground_floor_area')->nullable();
            $table->integer('upper_floor_length')->nullable();
            $table->integer('upper_floor_width')->nullable();
            $table->integer('upper_floor_area')->nullable();
            $table->integer('further_floor_length')->nullable();
            $table->integer('further_floor_width')->nullable();
            $table->integer('further_floor_area')->nullable();
            $table->integer('total_area')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_family_house');
    }
}
