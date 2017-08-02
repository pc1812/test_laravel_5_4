<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';   

    protected $fillable = ['user_id', 'thread_id', 'replyee_id', 'post_content', 'created_at', 'updated_at']; 
}
