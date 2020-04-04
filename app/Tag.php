<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
 protected $fillable = ['tag_name'];
    // many to many relationship set with posts
    public function posts(){
        return $this->belongsToMany('App\Post');
    }
}
