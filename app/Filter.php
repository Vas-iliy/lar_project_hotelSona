<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    public function articles() {
        $articles = $this->hasMany('App\Article');

        return $articles;
    }
}
