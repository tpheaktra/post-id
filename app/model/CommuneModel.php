<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class CommuneModel extends Model
{
    //communes
    protected $connection = 'mysql2';
    protected  $table = 'communes';
}
