<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYesElectricLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yes_electric_link', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('q_electric_id')->nullable();
            $table->tinyInteger('g_information_id')->nullable();
            $table->integer('costs_in_hour')->nullable();
            $table->integer('number_in_month')->nullable();
            $table->float('costs_per_month')->nullable();
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
        Schema::dropIfExists('yes_electric_link');
    }
}
