<?php

namespace App\model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class GeneralInformationModel extends Model
{
    protected $table='general_information';
    protected $fillable = [
        'user_id',
        'hhid',
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
        'expire_date',
    ];
    public function getYear(){
        return !empty($this->interview_date) ? date("Y", strtotime($this->interview_date)) : null;
    }
    public function getMonth(){
        return !empty($this->interview_date) ? date("m", strtotime($this->interview_date)) : null;
    }
    public function hospital(){
        return $this->hasOne(HospitalModel::class, 'code', 'hf_code');
    }
    public function provinces(){
        return $this->hasOne(ProvinceModel::class, 'code', 'g_province_id');
    }
    public function district(){
        return $this->hasOne(DistrictModel::class, 'code', 'g_district_id');
    }
    public function commune(){
        return $this->hasOne(CommuneModel::class, 'code', 'g_commune_id');
    }
    public function village(){
        return $this->hasOne(VillageModel::class, 'code', 'g_village_id');
    }
    public function sex(){
        return $this->hasOne(GenderModel::class,'id','g_sex');
    }
    public function userinterview(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function score(){
        return $this->hasOne(StoreScoreModel::class, 'patient', 'id');
    }
    public function shpHouseholds(){
        return $this->hasOne(ShpHouseholdsModel::class, 'printedcardno', 'printcardno');
    }

    public function memberFamily(){
        return $this->hasMany(MemberFamilyModel::class, 'g_information_id', 'id');
    }

    public function generate_report_by_month(){
        return $this->hasOne(ProvinceModel::class, 'code','g_province_id');
    }
    public function health_facilities(){
        return $this->hasOne(HealthFacilities::class, 'code','hf_code');
    }

}
