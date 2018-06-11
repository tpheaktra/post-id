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
        'ground_floor_length',
        'ground_floor_width',
        'ground_floor_area',
        'upper_floor_length',
        'upper_floor_width',
        'upper_floor_area',
        'further_floor_length',
        'further_floor_width',
        'further_floor_area',
        'total_area',

        'tolet',
        'tolet_1',
        'tolet_2',
        'h_build_year_id',
        'home_prepar_id',

        'roof_made',
        'roof_status',
        'walls_made',
        'walls_status',
        'condition_house_id',
        'rent_fee',
        //'household_consumer_id'
    ];
}
