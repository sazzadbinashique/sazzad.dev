<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{


    protected  $fillable = [ 'admin_post_id','is_active', 'author', 'email', 'body'];




    public  function comment_relpy(){
        return $this->hasMany('App\CommentReply');
    }
}
