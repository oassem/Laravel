<?php

namespace App\Http\Controllers;

class PostsController extends Controller
{
    public function index()
    {
        $posts = [
            ['id' => 1, 'title' => 'first post', 'postedBy' => 'Omar', 'createdAt' => '22-10-12'],
            ['id' => 2, 'title' => 'second post', 'postedBy' => 'Ahmed', 'createdAt' => '22-10-2'],
            ['id' => 3, 'title' => 'third post', 'postedBy' => 'Yara', 'createdAt' => '22-10-13']
        ];
        return view('posts/index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $posts = [
            ['id' => 1, 'title' => 'first post', 'postedBy' => 'Omar', 'createdAt' => '22-10-12'],
            ['id' => 2, 'title' => 'second post', 'postedBy' => 'Ahmed', 'createdAt' => '22-10-2'],
            ['id' => 3, 'title' => 'third post', 'postedBy' => 'Yara', 'createdAt' => '22-10-13']
        ];
        return view('posts/show', ['posts' => $posts, 'id' => $id]);
    }

    public function edit($id)
    {
        $posts = [
            ['id' => 1, 'title' => 'first post', 'postedBy' => 'Omar', 'createdAt' => '22-10-12'],
            ['id' => 2, 'title' => 'second post', 'postedBy' => 'Ahmed', 'createdAt' => '22-10-2'],
            ['id' => 3, 'title' => 'third post', 'postedBy' => 'Yara', 'createdAt' => '22-10-13']
        ];
        $names = ['Ahmed', 'Omar', 'Yara'];
        return view('posts/edit', ['posts' => $posts, 'id' => $id, 'names' => $names]);
    }

    public function update($id)
    {
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        return redirect()->route('posts.index');
    }
}
