<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class OtherIncomeModel extends Model
{
    protected $table='other_income';
    protected $fillable = [
        'income_name',
        'income_age',
        'income_occupation',
        'income_unit',
        'unit_in_month',
        'average_amount',
        'monthly_income',
        'total_monthly_income',
        'total_income_person'
    ];
}
