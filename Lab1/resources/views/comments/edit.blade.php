<form class="mt-5" method="post" action="{{route('comments.update', $comment->id)}}">
    @method('put')
    @csrf
    <div class="form-group">
        <input type="text" class="form-control" name="comment" value="{{$comment->content}}">
    </div><br>
    <button type="submit" class="btn btn-primary mb-5">Edit</button>
</form>