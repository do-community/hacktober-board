<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function labels()
    {
        return $this->belongsToMany('App\Label');
    }
}
