<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_family', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('g_information_id')->nullable();
            $table->string('nick_name')->nullable();
            $table->string('dob')->nullable();
            $table->string('age')->nullable();
            $table->string('family_relationship')->nullable();
            $table->string('occupation')->nullable();
            $table->string('education_level')->nullable();
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
        Schema::dropIfExists('member_family');
    }
}
