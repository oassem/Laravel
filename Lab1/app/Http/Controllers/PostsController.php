<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Http\Responses\PostsShowView;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\PostResource;

class PostsController extends Controller
{
    public function index()
    {
        //PruneOldPostsJob::dispatch();
        $posts = Post::all();
        $posts = Post::paginate(10);
        return view('posts/index', ['posts' => $posts]);
    }

    public function index_()
    {
        $posts = Post::with('user')->get();
        $posts = Post::paginate(10);
        return PostResource::collection($posts);
    }

    public function create()
    {
        $users = User::all();
        return view('posts/create', ['users' => $users]);
    }

    public function store(PostRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->poster;
        $imageName = time() . '.' . $request->image->extension();
        $post->image = $imageName;
        $request->image->storeAs('public', $imageName);
        $post->save();
        return redirect()->route('posts.index');
    }

    public function store_(PostRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->poster;
        $imageName = time() . '.' . $request->image->extension();
        $post->image = $imageName;
        $request->image->storeAs('public', $imageName);
        $post->save();
    }

    public function show($id)
    {
        $post = Post::where('id', $id)->first();
        return view('posts/show', ['post' => $post]);
    }

    public function show_($id)
    {
        $post = Post::where('id', $id)->first();
        return new PostResource($post);
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

    public function update($id, PostRequest $request)
    {
        $post = Post::where('id', $id)->first();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->poster;
        if ($request->image) {
            Storage::delete('public/' . $post->image);
            $imageName = time() . '.' . $request->image->extension();
            $post->image = $imageName;
            $request->image->storeAs('public', $imageName);
        }
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
