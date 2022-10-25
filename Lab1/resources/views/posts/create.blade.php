@extends('layouts.app')
@section('title') Create @endsection
@section('content')
<form class="w-50 mt-5 mx-5" method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-5">
        <input type="text" name="title" class="form-control" placeholder="Enter title">
    </div>
    <div class="form-group mb-5">
        <textarea type="text" name="description" class="form-control" placeholder="Enter description" rows="3"></textarea>
    </div class="form-group mb-5">
    <div>
        <select name="poster" class="form-select mb-5">
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-5">
        <input type="file" class="form-control" name="image" />
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection