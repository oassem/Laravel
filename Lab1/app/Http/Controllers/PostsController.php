<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Responses\PostsShowView;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $posts = Post::paginate(10);
        return view('posts/index', ['posts' => $posts]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts/create', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->poster;
        $post->save();
        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = Post::where('id', $id)->first();
        return view('posts/show', ['post' => $post]);
    }

    public function ajax($id)
    {
        $post = Post::where('id', $id)->first();
        return new PostsShowView(['post' => $post]);
    }

    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        $users = User::all();
        return view('posts/edit', ['post' => $post, 'users' => $users]);
    }

    public function update($id, Request $request)
    {
        $post = Post::where('id', $id)->first();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->poster;
        $post->save();
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function restore()
    {
        Post::withTrashed()
            ->restore();
        return redirect()->route('posts.index');
    }
}