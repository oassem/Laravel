<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->content = $request->comment;
        $comment->commentable_id = $request->id;
        $comment->commentable_type = Post::class;
        $comment->save();
        return redirect()->route('posts.show', $request->id);
    }

    public function edit($id)
    {
        $comment = Comment::where('id', $id)->first();
        return view('comments/edit', ['comment' => $comment]);
    }

    public function update($id, Request $request)
    {
        $comment = Comment::where('id', $id)->first();
        $comment->content = $request->comment;
        $comment->save();
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('posts.index');
    }
}
