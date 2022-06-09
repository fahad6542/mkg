<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'name_urdu', 
        'description', 
        'company_id', 
        'is_active'
    ];

}
