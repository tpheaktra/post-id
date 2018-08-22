<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class HospitalModel extends Model
{
    protected $connection = 'mysql2';
    protected  $table = 'health_facilities';
}
