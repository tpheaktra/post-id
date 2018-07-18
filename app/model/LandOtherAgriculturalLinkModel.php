<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class LandOtherAgriculturalLinkModel extends Model
{
    protected $table='land_agricultural_link_other';
    protected $fillable = [
        'g_information_id',
        'land_agricultural_id',
        'land_name',
        'total_land',
        'land_farm',
        'total_land_farm',
        'sum_land_farm'
    ];
}
