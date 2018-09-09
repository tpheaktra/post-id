<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ShpHouseholdsModel extends Model
{
    protected $connection = 'mysql3';
    protected  $table = 'shp_households';
    public  $timestamps = false;
    protected $fillable = [
        'hhid',
        'province',
        'district',
        'commune',
        'village',
        'location',
        'printedcardno',
        'roundnum' ,
        'interviewscore',
        'interviewdate',
        'expirydate',
        'entryby',
        'entrydate',
        'poorcategory'
    ];
}
