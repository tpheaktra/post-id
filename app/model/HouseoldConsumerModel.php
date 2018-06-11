<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class HouseoldConsumerModel extends Model
{
    protected $table='household_consumer';
    protected $fillable = [
        'g_situation_family_id',
        'type_meterial',
        'number_meterial',
        'market_value_meterial',
        'total_rail',
        'total_meterial_costs'
    ];
}
