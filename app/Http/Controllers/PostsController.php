<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:1|max:255',
            'body'  => 'required|min:1|max:800',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $validatedData['user_id'] = \Auth::id();
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $file->move(public_path('\img'), $file->getClientOriginalName());

            $validatedData['img'] = $file->getClientOriginalName();
        }

        // dd($validatedData);
        $post = Post::create($validatedData);

        return redirect($post->path());
    }


    public function show(Post $post)
    {
        return view('posts.show')->with('post', $post);
    }

    public function edit(Post $post)
    {
        return view('posts.edit')->with('post', $post);
    }


    public function update(Request $request,Post $post)
    {
            $validatedData = $request->validate([
            'title' => 'required|min:1|max:255',
            'body'  => 'required|min:1|max:800',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // dd($request->all());
        $validatedData['user_id'] = \Auth::id();
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = $file->getClientOriginalName(); //
            $file->move(public_path('\img'), $file->getClientOriginalName());
            $validatedData['img'] = $file->getClientOriginalName();

        }

        $post->update($validatedData);

        return redirect()->route('posts.show',$post);
    }

    public function destroy(Post $post)
    {
        // dd($id);
        $post->delete();
        return redirect('/home');
    }

}
