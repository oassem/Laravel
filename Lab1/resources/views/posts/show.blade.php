@extends('layouts.app')
@section('title') Show details @endsection
@section('content')
<div class="w-50 mt-5 mx-5">
    <div class="card">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <div><b>Title:</b> {{$post['title']}}</div><br>
            <div><b>Description:</b> {{$post['description']}}</div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            <div><b>Name:</b> {{$post->user->name}}</div>
            <div><b>Email:</b> {{$post->user->email}}</div>
            <div><b>Created at:</b> {{$post->created_at}}</div>
        </div>
    </div>

    <!--<div class="mt-5">
        <div>
            <h3>Comments</h3>
        </div>
        @foreach($post->comments as $comment)
        <div class="mt-4 rounded px-2 py-2 d-flex justify-content-between" style="border: 1.5px solid #D2D2D2; background-color:aliceblue">
            <div class="pt-1" style="font-weight: 500; font-family:cursive">{{$comment->content}}</div>
            <div class="d-flex justify-content-around">
                <a type="button" class="btn btn-secondary text-white mx-3" href="{{route('comments.edit', $comment->id)}}">Edit</a>
                <form action="{{route('comments.destroy', $comment->id)}}" method="post">
                    <input class="btn btn-danger" type="submit" value="Delete" />
                    @method('delete')
                    @csrf
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <form class="mt-5" method="post" action="{{route('comments.store')}}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="comment" placeholder="Enter comment">
            <input name="id" value="{{$post['id']}}" hidden>
        </div><br>
        <button type="submit" class="btn btn-primary mb-5">Add</button>
    </form>-->

    <!--This is the comments component-->
    @livewire('counter', ['ID' => $post->id])
</div>
@endsection