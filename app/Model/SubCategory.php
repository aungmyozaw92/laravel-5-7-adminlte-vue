<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
	protected $fillable = [
        'name','category_id', 'slug', 'is_ordering'
    ];

    public function category()
    {
        return  $this->belongsTo('App\Model\Category');
    }

    public function posts()
    {
    	return  $this->hasMany('App\Model\Post');
    }
}
