<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class HealthFacilities extends Model
{
    //communes
    protected $connection = 'mysql2';
    protected  $table = 'health_facilities';
}
