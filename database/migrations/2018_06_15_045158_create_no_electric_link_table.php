<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoElectricLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('no_electric_link', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('q_electric_id')->nullable();
            $table->tinyInteger('g_information_id')->nullable();
            $table->tinyInteger('electric_grid_id')->nullable();
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
        Schema::dropIfExists('no_electric_link');
    }
}
