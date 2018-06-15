<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class NoElectricLinkModel extends Model
{
    protected $table= 'no_electric_link';
    protected $fillable = [
        'q_electric_id',
        'g_information_id',
        'electric_grid_id'
    ];
}
