<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeIncomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_income', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('g_information_id')->nullable();
            $table->tinyInteger('type_animals_id')->nullable();
            $table->integer('num_animals_big')->nullable();
            $table->integer('num_animals_small')->nullable();
            $table->integer('note_animals')->nullable();
            $table->float('total_animals_costs')->nullable();
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
        Schema::dropIfExists('type_income');
    }
}
