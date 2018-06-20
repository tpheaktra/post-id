<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class TypeToiletLinkModel extends Model
{
    protected $table='type_toilet_link';
    protected $fillable = [
        'g_information_id',
        'toilet_id',
        'toilet_1',
        'toilet_2'
    ];
}
