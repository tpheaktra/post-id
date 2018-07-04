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



            $table->tinyInteger('toilet_id')->nullable();

            $table->integer('q_electric_id')->nullable();
            $table->tinyInteger('transport_id')->nullable();
            $table->tinyInteger('land_agricultural_id')->nullable();


            $table->tinyInteger('debt_family_id')->nullable();
            $table->text('command')->nullable();


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
