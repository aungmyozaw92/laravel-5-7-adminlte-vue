<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    // use Notifiable;

    protected $fillable = [
        'name','category_id', 'sub_category_id', 'description','user_id'
    ];

    public function category()
    {
        return  $this->belongsTo('App\Model\Category');
    }

    public function subcategory()
    {
        return  $this->belongsTo('App\Model\SubCategory');
    }

    public function user()
    {
        return  $this->belongsTo('App\User');
    }

    public function getLink()
    {
        return route('app.post.view', $this->slug);
    }
}
