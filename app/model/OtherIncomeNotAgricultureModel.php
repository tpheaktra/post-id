<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class OtherIncomeNotAgricultureModel extends Model
{
    protected $table='other_income_not_agriculture';
    protected $fillable = [
        'g_information_id',
        'income_name_not',
        'income_age_not',
        'income_occupation_not',
        'income_unit_not',
        'unit_in_month_not',
        'average_amount_not',
        'monthly_income_not',
        'total_mon_income_not',
        'total_inc_person_not'
    ];
}
