<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OverTime extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'date',
        'check_in',
        'check_out',
        'overtime'
    ];
}
