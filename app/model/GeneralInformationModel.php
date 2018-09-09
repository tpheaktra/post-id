<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class GeneralInformationModel extends Model
{
    protected $table='general_information';
    protected $fillable = [
        'user_id',
        'od_code',
        'hf_code',
        'interview_code',
        'printcardno',
        'g_patient',
        'g_age',
        'g_sex',
        'g_phone',
        'g_province_id',
        'g_district_id',
        'g_commune_id',
        'g_village_id',
        'g_local_village',
        //interview
        'inter_patient',
        'inter_age',
        'inter_sex',
        'inter_phone',
        'inter_relationship_id',
        //family
        'fa_patient',
        'fa_age',
        'fa_sex',
        'fa_phone',
        'fa_relationship_id',
        'record_status',
        'interview_date',
        'expire_date'
    ];
    public function hospital(){
        return $this->hasMany(HospitalModel::class, 'code', 'hf_code');
    }
    public function provinces(){
        return $this->hasMany(ProvinceModel::class, 'code', 'g_province_id');
    }
    public function district(){
        return $this->hasMany(DistrictModel::class, 'code', 'g_district_id');
    }
    public function commune(){
        return $this->hasMany(CommuneModel::class, 'code', 'g_commune_id');
    }
    public function village(){
        return $this->hasMany(VillageModel::class, 'code', 'g_village_id');
    }
    public function score(){
        return $this->hasMany(StoreScoreModel::class, 'patient', 'id');
    }
    public function shpHouseholds(){
        return $this->hasMany(ShpHouseholdsModel::class, 'printedcardno', 'printcardno');
    }

    public function memberFamily(){
        return $this->hasMany(MemberFamilyModel::class, 'g_information_id', 'id');
    }

}
