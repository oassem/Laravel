<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Post;

class Counter extends Component
{
    public $comment;
    public $ID;
    public $post;

    public function submitForm()
    {
        $comment = new Comment;
        $comment->content = $this->comment;
        $comment->commentable_id = $this->ID;
        $comment->commentable_type = 'App\Models\Post';
        $comment->save();
        $this->comment = '';
    }

    public function deleteForm($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
    }

    public function render()
    {
        $this->post = Post::where('id', $this->ID)->first();
        return view('livewire.counter');
    }
}
