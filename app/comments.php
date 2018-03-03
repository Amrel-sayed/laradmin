<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    
    protected $fillable = [
        'body','commentable_id','commentable_type','user_id'
    ];
    // public function posts(){

    // 	return $this->belongsTo(posts::class);
    // } this for one to many relationship 
    

    public function commentable(){

        return $this->morphTo();
    }



    public function user(){

    	return $this->belongsTo(User::class);
    }



    public static function usercomm($id){
		
			return static::where('user_id',$id)->get();
		} 

}
