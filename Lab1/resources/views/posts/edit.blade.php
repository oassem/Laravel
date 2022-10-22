@extends('layouts.layout')
@section('title') Edit @endsection
@section('content')
@foreach($posts as $post)
@if(($post['id']) == $id)
<form class="w-50 mt-5 mx-5" method="post" action="{{route('posts.update', $post['id'])}}">
    @method('PUT')
    @csrf
    <div class="form-group mb-5">
        <input type="text" class="form-control" value="{{$post['title']}}">
    </div>
    <div class="form-group mb-5">
        <textarea type="text" class="form-control" rows="3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita est aut officia quidem non aperiam facilis temporibus laudantium, magnam dolores vero mollitia excepturi porro nostrum id, delectus labore. Repudiandae, suscipit?</textarea>
    </div class="form-group mb-5">
    <div>
        <select class="form-select mb-5">
            @foreach($names as $name)
            @if($post['postedBy'] == $name)
            <option selected>{{$name}}</option>
            @else
            <option>{{$name}}</option>
            @endif
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endif
@endforeach
@endsection