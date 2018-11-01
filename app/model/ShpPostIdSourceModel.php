<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ShpPostIdSourceModel extends Model
{
    protected $connection = 'mysql3';
    protected  $table = 'shp_postid_source';
    public  $timestamps = false;
    protected $fillable = [
        'printedcardno',
        'interviewdate',
        'interviewer',
    ];
}
