<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class DebtLoanLinkModel extends Model
{
    protected $table='debt_loan_link';
    protected $fillable = [
        'g_situation_family_id',
        'loan_id',
        'question_id',
        'total_debt'
    ];
}
