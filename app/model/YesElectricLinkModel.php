<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class YesElectricLinkModel extends Model
{
    protected $table= 'yes_electric_link';
    protected $fillable = [
        'q_electric_id',
        'g_information_id',
        'costs_in_hour',
        'number_in_month',
        'costs_per_month'
    ];
}
