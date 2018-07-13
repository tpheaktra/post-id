<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class GeneralSituationFamilyModel extends Model
{
    protected $table='general_situation_family';
    protected $fillable = [
        'g_information_id',
        'household_family_id',
        'total_people',
        'toilet_id',
        'q_electric_id',
        'transport_id',
        'land_agricultural_id',
        'debt_family_id',
        'command'
    ];
}
