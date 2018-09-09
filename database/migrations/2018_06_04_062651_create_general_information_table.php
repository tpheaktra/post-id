<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_information', function (Blueprint $table) {
            //genderal information
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('od_code')->nullable();
            $table->integer('hf_code')->nullable();
            $table->string('interview_code')->nullable();
            $table->string('printcardno')->nullable();
            $table->string('g_patient')->nullable();
            $table->string('g_age')->nullable();
            $table->string('g_sex')->nullable();
            $table->string('g_phone')->nullable();
            $table->integer('g_province_id')->nullable();
            $table->integer('g_district_id')->nullable();
            $table->integer('g_commune_id')->nullable();
            $table->integer('g_village_id')->nullable();
            $table->text('g_local_village')->nullable();
            //interview
            $table->string('inter_patient')->nullable();
            $table->string('inter_age')->nullable();
            $table->string('inter_sex')->nullable();
            $table->string('inter_phone')->nullable();
            $table->integer('inter_relationship_id')->nullable();
            //family situation
            $table->string('fa_patient')->nullable();
            $table->string('fa_age')->nullable();
            $table->string('fa_sex')->nullable();
            $table->string('fa_phone')->nullable();
            $table->integer('fa_relationship_id')->nullable();
            $table->integer('record_status')->default(1);
            $table->date('interview_date')->nullable();
            $table->date('expire_date')->nullable();
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
        Schema::dropIfExists('general_information');
    }
}
