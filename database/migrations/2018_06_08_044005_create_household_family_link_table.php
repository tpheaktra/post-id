<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdFamilyLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('household_family_link', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('household_family_id')->nullable();
            $table->tinyInteger('g_information_id')->nullable();
            $table->string('institutions_name')->nullable();
            $table->string('instatutions_phone')->nullable();
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
        Schema::dropIfExists('household_family_link');
    }
}
