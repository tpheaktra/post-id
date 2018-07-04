<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class HouseHoldRootLinkModel extends Model
{
    protected $table= 'household_root_link';
    protected $fillable = [
        'household_family_id',
        'g_information_id',
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
        'h_build_year',
        'home_prepare_id',
        'roof_made_id',
        'roof_status_id',
        'walls_made_id',
        'walls_status_id',
        'condition_house_id',

    ];
}
