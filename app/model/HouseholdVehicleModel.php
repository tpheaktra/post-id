<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class HouseholdVehicleModel extends Model
{
    protected $table='household_vehicle';
    protected $fillable = [
        'g_situation_family_id',
        'type_vehicle',
        'number_vehicle',
        'market_value_vehicle',
        'total_rail_vehicle',
        'total_vehicle_costs'
    ];
}
