<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class DebtLoanLinkModel extends Model
{
    protected $table='debt_loan_link';
    protected $fillable = [
        'g_information_id',
        'loan_id',
        'question_id',
        'total_debt',
        'debt_duration'
    ];
}
