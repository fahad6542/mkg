<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvanceSalaries extends Model
{
    use HasFactory;
    protected $fillable = [

          'id',
         'date',
         'employee_id',
         'monthly_salary',
         'prevous_advance_salary',
         'exp_loan_repay',
         'exp_bal_sal_of_month',
         'new_advance',
         'new_exp_bal_sal_of_month',
         'remarks'

     ];
}
