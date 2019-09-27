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

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function labels()
    {
        return $this->belongsToMany('App\Label');
    }
}
