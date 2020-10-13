<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function filter() {
        return $this->belongsTo('App\Filter');
    }

}
