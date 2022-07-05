<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'title',
        'Date',
        'description'
    ];

    public function employees()
    {
        return $this->belongsTo(employee::class);
    }
}
