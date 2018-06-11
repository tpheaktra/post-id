<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('household_vehicle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('g_situation_family_id')->nullable();
            $table->string('type_vehicle')->nullable();
            $table->integer('number_vehicle')->nullable();
            $table->integer('market_value_vehicle')->nullable();
            $table->integer('total_rail_vehicle')->nullable();
            $table->float('total_vehicle_costs')->nullable();
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
        Schema::dropIfExists('household_vehicle');
    }
}
