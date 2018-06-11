<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class HouseHoldFamilyLinkModel extends Model
{
    protected $table='household_family_link';
    protected $fillable = [
        'household_family_id',
        'institutions_name',
        'instatutions_phone'
    ];
}
