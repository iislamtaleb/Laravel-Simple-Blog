<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\LikesDislikes;
use Illuminate\Support\Facades\Auth;

class LikeDislike extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }


    public function likedDislike($like = true)
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect('login');
        }

        $model = LikesDislikes::where('user_id','=',$user->id)
        ->where('post_id','=',$this->post->id)
        ->first();

        if (!$model) {
            LikesDislikes::create([
                'like'=>$like,
                'user_id'=>$user->id,
                'post_id'=>$this->post->id
            ]);

            return;
        }

        if ($like && $model->like || !$like && !$model->like) {
            $model->delete();

            
        }

        else {
            $model->like = $like;
            $model->save();
        }
    }



    public function render()
    {

        $user = Auth::user();

        $likes = LikesDislikes::where('like','=',true)
        ->where('post_id','=',$this->post->id)
        ->count();

        $dislikes = LikesDislikes::where('like','=',false)
        ->where('post_id','=',$this->post->id)
        ->count();


        $isLiked = false;
        $isDisliked = false;



        if ($user) {
            $liked = LikesDislikes::where('user_id','=',$user->id)
            ->where('post_id','=',$this->post->id)
            ->first();


            if ($liked) {
                $isLiked = $liked->like;
                $isDisliked = !$isLiked;
            }
        }
        

        return view('livewire.like-dislike',compact('likes','dislikes','isLiked','isDisliked'));
    }
}
