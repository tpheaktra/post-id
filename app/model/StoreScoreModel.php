<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class StoreScoreModel extends Model
{
    protected $table = 'store_score';
    protected $fillable = [
        'patient',
        'size_member',
        'toilet',
        'roof',
        'wall',
        'house_status',
        'price_rent_house',
        'price_electronic',
        'use_energy_elect',
        'no_energy_elect',
        'vehicle',
        'animal',
        'personal_farm',
        'other_farm',
        'income_out_farmer',
        'income_child',
        'disease',
        'debt',
        'edu',
        'age_action',
        'record_status',
        'created_at',
        'updated_at'
    ];
}
