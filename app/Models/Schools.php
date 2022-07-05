<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{
    use HasFactory;
    protected $fillable = 
    [
    'name', 
    'name_urdu', 
    'contact_person', 
    'contact_no', 
    'address', 
    'description', 
    'company_id', 
    'is_active'];

}
