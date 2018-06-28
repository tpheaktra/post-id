<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class VillageModel extends Model
{
    protected $connection = 'mysql2';
    protected  $table = 'villages';
}
