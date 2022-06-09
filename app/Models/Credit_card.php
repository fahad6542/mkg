<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit_card extends Model
{
    use HasFactory;
    protected $fillable = ['credit_title', 'description','is_active','branch_id'];

}
