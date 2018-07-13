<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class HealthDisabilityModle extends Model
{
    protected $table = 'health_link';
    protected $fillable = [
        'g_information_id',
        'health_id',
        'health_id_1',
        'kids_then65',
        'old_bigger65',
        'kids_50_then65',
        'old_50_bigger65',
    ];
}
