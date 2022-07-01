<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [

       'employee_id',
        'Date',
        'shift_time_in',
        'shift_time_out'
    ];
}
