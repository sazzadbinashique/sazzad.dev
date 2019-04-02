<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public $directory = "/images/";


    protected $fillable=[ 'user_id','title','content', 'is_admin', 'path'];


    public function user(){

        return $this->belongsTo('App\User');
    }


    public  function role(){
        return $this->belongsTo('App\Role');
    }



    public  function getPathAttribute($value){

        return $this->directory . $value;
    }



    public function post_comment(){

        return $this->hasMany('App\PostComment');
    }
}
