@extends('layouts.app')
@section('title') Home @endsection
@section('content')
<div class="d-flex justify-content-center w-50 mx-auto mt-5" style='font-family:cursive'>
    <a href="{{route('posts.create')}}">
        <x-button type="success"><b>Create post</b></x-button>
    </a>
    <a type="button" class="mx-5 btn btn-secondary" href="{{route('posts.restore')}}"><b>Restore posts</b></a>
</div>
<table class="table mt-5 mx-auto" style="text-align:center; width:60%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted by</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <th scope="row">{{$post['id']}}</th>
            <td>{{$post['title']}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->created_at}}</td>
            <td class="d-flex justify-content-around">
                <a type="button" class="btn btn-info text-white" href="{{route('posts.show', $post['id'])}}">View</a>
                <a type="button" class="btn btn-warning" href="{{route('posts.ajax', $post['id'])}}">View Ajax</a>
                <a type="button" class="btn btn-primary" href="{{route('posts.edit', $post['id'])}}">Edit</a>
                <form action="{{route('posts.destroy', $post['id'])}}" method="post">
                    <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure?')" />
                    @method('delete')
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="w-50 mx-auto my-5 d-flex justify-content-center">
    {{ $posts->links() }}
</div>
@endsection