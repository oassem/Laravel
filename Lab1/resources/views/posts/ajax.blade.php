@extends('layouts.app')
@section('title') Ajax @endsection
@section('content')
<div class="modal fade show d-block" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$post->title}}</h5>
            </div>
            <div class="modal-body">
                {{$post->description}}
            </div>
            <div class="modal-body">
                <span><b>User name:</b> {{$post->user->name}}</span>
                <span class="mx-4"><b>User email:</b> {{$post->user->email}}</span>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-primary" href="{{route('posts.index')}}">Close me please!</a>
            </div>
        </div>
    </div>
</div>
@endsection