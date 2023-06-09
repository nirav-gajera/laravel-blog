<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function store(Post $post)
    {
        $this->validate(request(), [
            'new_comment' => 'required|min:1|max:255'
        ]);

        $post->comments()->create([
            'user_id'   => auth()->id(),
            'body'      => request()->new_comment
        ]);

        return redirect()->back();
    }
}
