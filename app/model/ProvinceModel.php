<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ProvinceModel extends Model
{
    //communes
    protected $connection = 'mysql2';
    protected  $table = 'provinces';
}
