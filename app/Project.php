<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $incrementing = false;

    public function issues()
    {
        return $this->hasMany('App\Issue');
    }
}
