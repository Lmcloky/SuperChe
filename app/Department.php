<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	protected $fillable=['name','description'];

    public function categories()
    {
    	return $this->hasMany(Category::class);
    }
    public function getFeaturedImageUrlAttribute()
    {
    	if ($this->image)
            return '/images/departments/'.$this->image;
        //else
        return '/images/default.svg.png';
    }
}
