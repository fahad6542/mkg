<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [


     
    'password',
    'code', 
    'branch_code',
    'account_number',
    'name',
    'urdu_name', 
    'father_name',


    'department',
    'branch_id',
    'staff_group', 
    'designation',
    'designation_urdu',



    'validity_Date',
    'birth_date', 
    'hire_date',

    'spo',

    'address',
    'address_urdu', 
    'city',
    'country',
    'home_phone_no',
    'mobile_no', 
    'email',
    'nic',
    'remarks',
    'resign_date', 
    'salaried_emp',
    'salary_type',
    'monthly_salary',
    'daily_works_hours', 
    'over_time_hours',
    'loan_payable',
    'advance_salary',
    'loan_installment', 
    'exp_salary_payable',
    'shift_time_in',
    'shift_time_out',
    'early_relaxation_time',
    'late_relaxation_time',
    'is_active',
    'delete_status',


];


public function leaves()
{
    return $this->hasMany(leave::class);
}

}


