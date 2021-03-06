<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandAgriculturalLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_agricultural_link', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('land_agricultural_id')->nullable();
            $table->tinyInteger('g_information_id')->nullable();
            $table->integer('p_land_name')->nullable();
            $table->integer('p_total_land')->nullable();
            $table->integer('p_land_farm')->nullable();
            $table->integer('p_total_land_farm')->nullable();
            $table->double('p_sum_land_farm')->nullable();
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
        Schema::dropIfExists('land_agricultural_link');
    }
}
