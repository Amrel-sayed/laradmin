<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class posts extends Model
{
    protected $fillable = [
        'title', 'body','user_id','image','image_title'
    ];

   // public function comments(){

   //  	return $this->hasMany(comments::class);
   //  } related to one to many relastion 

    public function comments(){

        return $this->morphMany(comments::class,'commentable'); // related to polymorphic relation 
    }	

    public function user(){

    	return $this->belongsTo(User::class);
    }
    
    public function tags(){

    	return $this->belongsToMany(tags::class);
    }


// ====================================================================
    public function scopeFilter($query,$filter){

		if(! empty($filter)){
			
			 if($filter['month'] && $filter['year'] ){
			       
			            $month=Carbon::parse($filter['month'])->month;

			            $year=$filter['year'];

			        $query->whereMonth('created_at',$month)->whereYear('created_at',$year); 
												    }       

						    }
												}

		public static function Archive(){
			
			return static::selectRaw('year(created_at) yr, monthname(created_at) mon, count(*) published')
                            ->groupBy('yr','mon')
                            ->orderByRaw('min(created_at) ASC')
                            ->get();

		} 

		public static function userposts($id){
			
			return static::where('user_id',$id)->get();
		} 

}
