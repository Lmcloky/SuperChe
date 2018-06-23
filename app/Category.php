<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //$category->products
    public function products()
    {
    	return $this->hasMany(Product::class);
    }
    //$category->department
    public function department()
    {
    	return $this->belongsTo(Department::class);
    }
}
