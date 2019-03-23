<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   
 public $directory = "/images/";

//
// 	public static function scopeLatest($query){
//
// 		return $query->orderBy('id', 'asc')->get();
// 	}

protected $fillable=['title','content', 'path'];


     public function user(){

         return $this->belongsTo('App\User');
     }



     public  function getPathAttribute($value){

         return $this->directory . $value;
     }
}
