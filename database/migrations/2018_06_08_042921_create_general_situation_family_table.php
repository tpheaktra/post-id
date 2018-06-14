<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralSituationFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_situation_family', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('g_information_id')->nullable();
            $table->integer('household_family_id')->nullable();
            $table->integer('total_people')->nullable();

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

//            $table->string('tolet')->nullable();
//            $table->string('tolet_1')->nullable();
//            $table->string('tolet_2')->nullable();
//
//            $table->integer('h_build_year_id')->nullable();
//            $table->integer('home_prepar_id')->nullable();
           // $table->integer('rent_fee')->nullable();
//
//            $table->integer('q_electric_id')->nullable();
//            $table->string('costs_in_hour')->nullable();
//            $table->string('number_in_month')->nullable();
//            $table->string('costs_per_month')->nullable();
//            $table->integer('electric_grid_id')->nullable();
//            $table->string('go_hospital')->nullable();
//
//            $table->integer('land_agricultural_id')->nullable();
//            $table->string('land_name')->nullable();
//            $table->string('total_land')->nullable();
//            $table->string('land_farm')->nullable();
//            $table->string('total_land_farm')->nullable();
//
//            $table->integer('debt_family_id')->nullable();


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
        Schema::dropIfExists('general_situation_family');
    }
}
