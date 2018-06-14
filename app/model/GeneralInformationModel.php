<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class GeneralInformationModel extends Model
{
    protected $table='general_information';
    protected $fillable = [
        'interview_code',
        'g_patient',
        'g_age',
        'g_sex',
        'g_phone',
        'g_province_id',
        'g_district_id',
        'g_commune_id',
        'g_village_id',
        'g_local_village',
        //interview
        'inter_patient',
        'inter_age',
        'inter_sex',
        'inter_phone',
        'inter_relationship_id',
        //family
        'fa_patient',
        'fa_age',
        'fa_sex',
        'fa_phone',
        'fa_relationship_id'
    ];
}
