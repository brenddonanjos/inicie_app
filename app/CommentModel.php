<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    protected $table = "comments";

    public function post()
    {
        return $this->belongsTo('App\PostModel');
    }
}
