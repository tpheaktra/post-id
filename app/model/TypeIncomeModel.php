<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class TypeIncomeModel extends Model
{
    protected $table='type_income';
    protected $fillable = [
        'g_situation_family_id',
        'type_animals',
        'num_animals_big',
        'num_animals_small',
        'note_animals',
        'total_animals_costs'
    ];
}
