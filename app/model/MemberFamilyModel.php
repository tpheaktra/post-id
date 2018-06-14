<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class MemberFamilyModel extends Model
{
    protected $table='member_family';
    protected $fillable = [
        'g_information_id',
        'nick_name',
        'dob',
        'age',
        'family_relationship_id',
        'occupation_id',
        'education_level_id'
    ];
}
