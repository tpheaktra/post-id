<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherIncomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_income', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('g_information_id')->nullable();
            $table->string('income_name')->nullable();
            $table->integer('income_age')->nullable();
            $table->integer('income_occupation')->nullable();
            $table->string('income_unit')->nullable();
            $table->integer('unit_in_month')->nullable();
            $table->integer('average_amount')->nullable();
            $table->integer('monthly_income')->nullable();
            $table->integer('total_mon_income')->nullable();
            $table->integer('total_inc_person')->nullable();
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
        Schema::dropIfExists('other_income');
    }
}
