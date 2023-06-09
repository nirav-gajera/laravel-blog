<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['user_id', 'post_id', 'body'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
    	return $this->belongsTo(Post::class, 'post_id');
    }

    public function replies()
    {
    	return $this->hasMany(Reply::class, 'comment_id');
    }
}
