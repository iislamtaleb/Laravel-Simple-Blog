<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CommentCreate extends Component
{
    public string $comment = '';

    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    

    public function createComment()
    {
        $user = Auth::user();
        if ($user) {
            $comment = Comment::create([
                'comment' => $this->comment,
                'post_id' => $this->post->id,
                'user_id' => $user->id
            ]);

            $this->emitUp('commentCreated', $comment->id);
        }

        else {
            return redirect('login');
        }
        
    }
    public function render()
    {
        return view('livewire.comment-create');
    }
}
