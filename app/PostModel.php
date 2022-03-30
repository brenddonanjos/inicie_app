<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    protected $table = "posts";

    //RELATIONSHIPS
    public function comments()
    {
        return $this->hasMany('App\CommentModel', 'post_id');
    }

    public function user()
    {
        return $this->belongsTo('App\UserModel');
    }
}
