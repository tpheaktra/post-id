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
            $table->double('size_member')->nullable();
            $table->double('toilet')->nullable();
            $table->double('roof')->nullable();
            $table->double('wall')->nullable();
            $table->double('house_status')->nullable();
            $table->double('price_rent_house')->nullable();
            $table->double('price_electronic')->nullable();
            $table->double('use_energy_elect')->nullable();
            $table->double('no_energy_elect')->nullable();
            $table->double('vehicle')->nullable();
            $table->double('animal')->nullable();
            $table->double('personal_farm')->nullable();
            $table->double('other_farm')->nullable();
            $table->double('income_out_farmer')->nullable();
            $table->double('income_out_not_farmer')->nullable();
            $table->double('income_child')->nullable();
            $table->double('disease')->nullable();
            $table->double('debt')->nullable();
            $table->double('edu')->nullable();
            $table->double('age_action')->nullable();
            $table->double('total')->nullable();
            $table->tinyInteger('record_status')->default(1);
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
