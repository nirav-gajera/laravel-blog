<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    // protected $primarykey = 'id';

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'img'
    ];


    public function owner() {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class, 'post_id');
    }

    /**
     * get show post route
     *
     * @return string
     */
    public function path()
    {
        return "/posts/{$this->id}";
    }
}
