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
            $table->string('income_name')->nullable();
            $table->integer('income_age')->nullable();
            $table->string('income_occupation')->nullable();
            $table->float('income_unit')->nullable();
            $table->float('unit_in_month')->nullable();
            $table->float('average_amount')->nullable();
            $table->float('monthly_income')->nullable();
            $table->float('total_monthly_income')->nullable();
            $table->float('total_income_person')->nullable();
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
