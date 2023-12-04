<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;

class Commentss extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public Post $post;
    #[Rule('required|max:500')]
    public string $comment;
    

    #[Computed()]
    public function comments()
    {
        
        return $this?->post->comments()->latest()->paginate(10);
    }
    
    
    public function render()
    {
        
        return view('livewire.commentss');
    }

    
    public function createComment()
    {

        $this->validateOnly('comment');
        $user = Auth::user();
        if ($user) {
            $this->post->comments()->create([
                'comment'=>$this->comment,
                'user_id'=>$user->id,
            ]);

            $this->reset('comment');
        }

        else {
            return redirect('login');
        }
        
    }


    public function deleteComment(Comment $comment)
    {
        
        $comment->delete();
    }
    
}
