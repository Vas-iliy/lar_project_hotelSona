<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function services() {
        return $this->belongsToMany('App\Service');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
