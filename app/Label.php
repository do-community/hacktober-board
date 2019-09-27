<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    public function issues()
    {
        return $this->belongsToMany('App\Issue');
    }
}
