<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [
        'post_id', 'user_id', 'content','is_active'
    ];

    public function post(){
        return $this->belongsTo('App\Post','post_id','id');
    }

    public function user() {
        return $this->belongsTo('App\User','user_id','id');
    }
}
