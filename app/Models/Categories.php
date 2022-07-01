<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = ['description','title','product_type_id','company_id'];


    public function type()
    {
        

        return $this->hasOne('App\Models\ProductType', 'id', 'product_type_id');
    }
}
