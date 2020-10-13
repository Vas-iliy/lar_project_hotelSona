<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function rooms() {
        return $this->belongsToMany('App\Room');
    }
}
