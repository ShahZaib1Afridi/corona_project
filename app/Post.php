<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model{
    use SoftDeletes;

// acessors
    public function getFeaturedAttribute($featured){
        return asset($featured);
    }

// assigment
protected $fillable = ['title', 'content', 'featured', 'category_id', 'slug'];


protected $dates = ['deleted_at'];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    // many to many relationship with tags
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
