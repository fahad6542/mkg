<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    use HasFactory;
    protected $fillable = ['description','name','category_id','company_id'];

    public function subcategories(){
        return $this->hasMany('App\SubCategories', 'category_id');
    }
}
