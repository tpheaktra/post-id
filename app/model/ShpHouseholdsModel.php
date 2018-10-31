<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ShpHouseholdsModel extends Model
{
    protected $connection = 'mysql3';
    protected  $table = 'shp_households';
    public  $timestamps = false;
    protected $fillable = [
        'province',
        'district',
        'commune',
        'village',
        'location',
        'hhid',
        'printedcardno',
        'roundnum',
        'ispreid',
        'interviewscore',
        'poorcategory',
        'isactive',
        'interviewer',
        'interviewdate',
        'expirydate',
        'entrydate',
        'entryby'
    ];
}
