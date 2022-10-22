@extends('layouts.layout')
@section('title') Home @endsection
@section('content')
<div style="text-align:center">
    <a href="{{route('posts.create')}}" style='font-family:cursive'>
        <x-button type="success" class="mt-5"><b>Create Post</b></x-button>
    </a>
</div>
<table class="table mt-5 w-50 mx-auto" style="text-align:center">
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
            <td>{{$post['postedBy']}}</td>
            <td>{{$post['createdAt']}}</td>
            <td class="d-flex justify-content-around">
                <a type="button" class="btn btn-info text-white" href="{{route('posts.show', $post['id'])}}">View</a>
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
<div class="d-flex mt-5 mx-auto w-50">
    <div style="background-color:aliceblue; color:blue" class="px-2">Prev</div>
    <div style="background-color:aliceblue; color:blue" class="px-2">1</div>
    <div style="background-color:aliceblue; color:blue" class="px-2">2</div>
    <div style="background-color:aliceblue; color:blue" class="px-2">Next</div>
</div>
@endsection