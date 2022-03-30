<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = "users";

    //RELATIONSHIPS
    public function posts()
    {
        return $this->hasMany('App\Post', 'user_id');
    }
}
