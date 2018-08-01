<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class LandAgriculturalLinkModel extends Model
{
    protected $table='land_agricultural_link';
    protected $fillable = [
        'g_information_id',
        'land_agricultural_id',
        'p_land_name',
        'p_total_land',
        'p_land_farm',
        'p_total_land_farm',
        'p_sum_land_farm'
    ];
}
