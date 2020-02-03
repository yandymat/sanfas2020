<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Msgbox extends Model
{
    public function pays()
    {
        return $this->belongsToMany('App\Pays')->withTimestamps();
    }
}
