<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdRentPriceLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('household_rent_price_link', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('household_family_id')->nullable();
            $table->tinyInteger('g_information_id')->nullable();
            $table->float('house_rent_price')->nullable();
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
        Schema::dropIfExists('household_rent_price_link');
    }
}
