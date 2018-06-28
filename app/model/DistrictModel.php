<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class DistrictModel extends Model
{
    protected $connection = 'mysql2';
    protected  $table = 'districts';
}
