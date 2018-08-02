<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherIncomeNotAgricultureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_income_not_agriculture', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('g_information_id')->nullable();
            $table->string('income_name_not')->nullable();
            $table->integer('income_age_not')->nullable();
            $table->integer('income_occupation_not')->nullable();
            $table->string('income_unit_not')->nullable();
            $table->integer('unit_in_month_not')->nullable();
            $table->integer('average_amount_not')->nullable();
            $table->integer('monthly_income_not')->nullable();
            $table->integer('total_mon_income_not')->nullable();
            $table->integer('total_inc_person_not')->nullable();
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
        Schema::dropIfExists('other_income_not_agriculture');
    }
}
