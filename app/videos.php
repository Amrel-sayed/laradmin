<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class videos extends Model
{
    public function comments(){

        return $this->morphMany(comments::class,'commentable');
    }
}
