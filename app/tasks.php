<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
   public static function withuser(){

   	return static::where('user_id',1);
   }
 public function scopenouse(){

   	return $this->where('user_id',0);
   }


}
