<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdRootLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('household_root_link', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('household_family_id')->nullable();
            $table->tinyInteger('g_information_id')->nullable();
            $table->tinyInteger('roof_made_id')->nullable();
            $table->tinyInteger('roof_status_id')->nullable();
            $table->tinyInteger('walls_made_id')->nullable();
            $table->tinyInteger('walls_status_id')->nullable();
            $table->tinyInteger('condition_house_id')->nullable();
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
        Schema::dropIfExists('household_root_link');
    }
}
