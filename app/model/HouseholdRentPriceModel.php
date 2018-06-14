<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class HouseholdRentPriceModel extends Model
{
    protected $table= 'household_rent_price_link';
    protected $fillable = [
        'household_family_id',
        'g_information_id',
        'house_rent_price'
    ];
}
