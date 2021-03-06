<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{


    protected  $fillable = [ 'admin_post_id','photo_id','is_active', 'author', 'email', 'body'];




    public  function comment_relpy(){
        return $this->hasMany('App\CommentReply');
    }


    public function admin_post(){
        return $this->belongsTo('App\AdminPost');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }


}
