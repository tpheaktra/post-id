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

//        'tolet',
//        'tolet_1',
//        'tolet_2',
//        'h_build_year_id',
//        'home_prepar_id',
//
//        'roof_made',
//        'roof_status',
//        'walls_made',
//        'walls_status',
//        'condition_house_id',
//        'rent_fee',
//
//        'q_electric_id',
//        'costs_in_hour',
//        'number_in_month',
//        'costs_per_month',
//        'electric_grid_id',
//        'go_hospital',
//
//        'land_agricultural_id',
//        'land_name',
//        'total_land',
//        'land_farm',
//        'total_land_farm',
//        'debt_family_id',

    ];
}
