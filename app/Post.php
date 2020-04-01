<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'content', 'slug'
    ];


    public function comments(){
       return $this->hasMany('App\Comments','post_id','id');
    }
}
