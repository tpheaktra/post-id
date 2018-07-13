<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_link', function (Blueprint $table) {

            $table->integer('g_information_id')->nullable();
            $table->tinyInteger('health_id')->nullable();
            $table->integer('kids_then65')->nullable();
            $table->integer('old_bigger65')->nullable();
            $table->integer('kids_50_then65')->nullable();
            $table->integer('old_50_bigger65')->nullable();
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
        Schema::dropIfExists('health_link');
    }
}
