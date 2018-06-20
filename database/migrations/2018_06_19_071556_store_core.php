<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoreCore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_score', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient');
            $table->string('size_member')->nullable();
            $table->string('toilet')->nullable();
            $table->string('roof')->nullable();
            $table->string('wall')->nullable();
            $table->string('house_status')->nullable();
            $table->string('price_rent_house')->nullable();
            $table->string('price_electronic')->nullable();
            $table->string('use_energy_elect')->nullable();
            $table->string('no_energy_elect')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('animal')->nullable();
            $table->string('personal_farm')->nullable();
            $table->string('other_farm')->nullable();
            $table->string('income_out_farmer')->nullable();
            $table->string('income_out_not_farmer')->nullable();
            $table->string('income_child')->nullable();
            $table->string('disease')->nullable();
            $table->string('debt')->nullable();
            $table->string('edu')->nullable();
            $table->string('age_action')->nullable();
            $table->string('record_status')->nullable();
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
        Schema::dropIfExists('store_score');
    }
}
