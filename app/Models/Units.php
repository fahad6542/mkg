<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    use HasFactory;
    //`delete_status`
    protected $fillable = ['title', 'scale', 'short_name', 'description','is_active'];
}
