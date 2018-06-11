<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class HomePreparLinkModel extends Model
{
    protected $table='home_prepar_link';
    protected $fillable = [
        'home_prepar_id',
        'home_year'
    ];
}
