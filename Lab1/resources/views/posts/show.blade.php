@extends('layouts.layout')
@section('title') Show details @endsection
@section('content')
<div class="w-50 mt-5 mx-5">
    @foreach($posts as $post)
    @if(($post['id']) == $id)
    <div class="card">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <div><b>Title:</b> {{$post['title']}}</div><br>
            <div><b>Description:</b> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore nobis explicabo corporis nam iure, omnis facilis harum modi ea illum quia sapiente sunt mollitia eaque atque ducimus odit voluptatem veniam!</div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            <div><b>Name:</b> {{$post['postedBy']}}</div>
            <div><b>Email:</b> xyz@gmail.com</div>
            <div><b>Created at:</b> {{$post['createdAt']}}</div>
        </div>
    </div>
</div>
@endif
@endforeach
@endsection