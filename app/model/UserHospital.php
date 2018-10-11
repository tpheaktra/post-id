<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class UserHospital extends Model
{
    protected $table ="user_hospital";

    public function user_hospital(){
        return $this->hasMany(HealthFacilities::class,'code','hospital_id');
    }
}
