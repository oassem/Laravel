@extends('layouts.layout')
@section('title') Edit @endsection
@section('content')
<form class="w-50 mt-5 mx-5" method="post" action="{{route('posts.update', $post['id'])}}">
    @method('PUT')
    @csrf
    <div class="form-group mb-5">
        <input type="text" name="title" class="form-control" value="{{$post['title']}}">
    </div>
    <div class="form-group mb-5">
        <textarea type="text" name="description" class="form-control" rows="3">{{$post['description']}}</textarea>
    </div class="form-group mb-5">
    <div>
        <select name="poster" class="form-select mb-5">
            @foreach($users as $user)
            @if($user->name == $post->user->name)
            <option value="{{$user->id}}" selected>{{$user->name}}</option>
            @else
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endif
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection