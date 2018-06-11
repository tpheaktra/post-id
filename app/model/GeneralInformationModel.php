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
        'g_province',
        'g_district',
        'g_commune',
        'g_village',
        'g_local_village',
        //interview
        'inter_patient',
        'inter_age',
        'inter_sex',
        'inter_phone',
        'inter_relationship',
        //family
        'fa_patient',
        'fa_age',
        'fa_sex',
        'fa_phone',
        'fa_relationship'
    ];
}
