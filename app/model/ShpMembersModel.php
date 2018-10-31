<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ShpMembersModel extends Model
{
    protected $connection = 'mysql3';
    protected  $table = 'shp_members';
    public  $timestamps = false;
    protected $fillable = [
        'printedcardno',
        'memberno',
        'name',
        'sex',
        'dob',
        'attendsschool',
        'membertype',
        'isactive',
        'entrydate',
        'entryby',
    ];
}
