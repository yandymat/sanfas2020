<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    public function posts()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }

    public function msgboxes()
    {
        return $this->belongsToMany('App\Msgbox', 'msgbox_id', 'id')->withTimestamps();
    }
}
