<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebtLoanLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debt_loan_link', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('g_situation_family_id')->nullable();
            $table->integer('loan_id')->nullable();
            $table->integer('question_id')->nullable();
            $table->integer('total_debt')->nullable();
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
        Schema::dropIfExists('debt_loan_link');
    }
}
