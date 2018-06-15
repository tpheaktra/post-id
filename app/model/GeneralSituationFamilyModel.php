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

        'toilet_id',
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
          'q_electric_id',
//        'costs_in_hour',
//        'number_in_month',
//        'costs_per_month',
//        'electric_grid_id',
          'transport_id',
//
        'kids_then65',
        'old_bigger65',
        'kids_50_then65',
        'old_50_bigger65',
        'debt_family_id'

    ];
}
