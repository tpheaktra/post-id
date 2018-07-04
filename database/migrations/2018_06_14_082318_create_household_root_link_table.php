<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdRootLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('household_root_link', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('household_family_id')->references('household_family_id')->index()->nullable();
            $table->tinyInteger('g_information_id')->references('g_information_id')->index()->nullable();
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
            $table->tinyInteger('h_build_year')->nullable();
            $table->tinyInteger('home_prepare_id')->references('home_prepare_id')->index()->nullable();
            $table->tinyInteger('roof_made_id')->references('roof_made_id')->index()->nullable();
            $table->tinyInteger('roof_status_id')->references('roof_status_id')->index()->nullable();
            $table->tinyInteger('walls_made_id')->references('walls_made_id')->index()->nullable();
            $table->tinyInteger('walls_status_id')->references('walls_status_id')->index()->nullable();
            $table->tinyInteger('condition_house_id')->references('condition_house_id')->index()->nullable();
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
        Schema::dropIfExists('household_root_link');
    }
}
