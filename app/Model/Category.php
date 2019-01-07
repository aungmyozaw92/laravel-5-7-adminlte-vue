<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = [
        'name', 'slug', 'is_ordering'
    ];

    public function subcategory()
    {
    	return  $this->hasMany('App\Model\SubCategory');
    }

    public function posts()
    {
    	return  $this->hasMany('App\Model\Post');
    }
}
