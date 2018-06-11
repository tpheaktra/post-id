<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdConsumerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('household_consumer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('g_situation_family_id')->nullable();
            $table->string('type_meterial')->nullable();
            $table->integer('number_meterial')->nullable();
            $table->integer('market_value_meterial')->nullable();
            $table->integer('total_rail')->nullable();
            $table->float('total_meterial_costs')->nullable();
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
        Schema::dropIfExists('household_consumer');
    }
}
