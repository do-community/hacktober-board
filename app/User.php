<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $incrementing = false;

    public function issues()
    {
        return $this->hasMany('App\Issue');
    }
}
