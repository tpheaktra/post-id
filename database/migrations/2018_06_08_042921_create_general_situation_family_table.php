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

            $table->tinyInteger('toilet_id')->nullable();
//            $table->string('tolet_1')->nullable();
//            $table->string('tolet_2')->nullable();


            $table->integer('q_electric_id')->nullable();
            $table->tinyInteger('transport_id')->nullable();

            $table->integer('kids_then65')->nullable();
            $table->integer('old_bigger65')->nullable();
            $table->integer('kids_50_then65')->nullable();
            $table->integer('old_50_bigger65')->nullable();
            $table->tinyInteger('debt_family_id')->nullable();


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
