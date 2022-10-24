<div>
    <div class="mt-5">
        <div>
            <h3>Comments</h3>
        </div>
        @foreach($post->comments as $_comment)
        <div class="mt-4 rounded px-2 py-2 d-flex justify-content-between" style="border: 1.5px solid #D2D2D2; background-color:aliceblue">
            <div class="pt-1" style="font-weight: 500; font-family:cursive">{{$_comment->content}}</div>
            <div class="d-flex justify-content-around">
                <a type="button" class="btn btn-secondary text-white mx-3" href="{{route('comments.edit', $_comment->id)}}">Edit</a>
                <form wire:submit.prevent="deleteForm({{$_comment->id}})" method="post">
                    <input class="btn btn-danger" type="submit" value="Delete" />
                    @method('delete')
                    @csrf
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <form class="mt-5" method="post" wire:submit.prevent="submitForm">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" wire:model="comment" placeholder="Enter comment">
        </div><br>
        <button type="submit" class="btn btn-primary mb-5">Add</button>
    </form>
</div>