<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected  $fillable = [ 'post_comment_id','is_active', 'author', 'email', 'body'];


    public function post_comment(){

        return $this->belongsTo('App\PostComment');
    }

}
