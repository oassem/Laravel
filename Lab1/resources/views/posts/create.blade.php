@extends('layouts.layout')
@section('title') Create @endsection
@section('content')
<form class="w-50 mt-5 mx-5" method="POST" action="{{route('posts.store')}}">
    @csrf
    <div class="form-group mb-5">
        <input type="text" class="form-control" placeholder="Enter title">
    </div>
    <div class="form-group mb-5">
        <textarea type="text" class="form-control" placeholder="Enter description" rows="3"></textarea>
    </div class="form-group mb-5">
    <div>
        <select class="form-select mb-5">
            <option>Ahmed</option>
            <option>Omar</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection