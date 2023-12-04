<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\PostView;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class HomepageController extends Controller
{
    public function index()
    {
        $popularposts = Post::query()
        ->leftJoin('likes_dislikes','posts.id','=','likes_dislikes.post_id')
        
        
        ->select('posts.id', 'posts.title', 'posts.slug', 'posts.thumbnail', 'posts.body', 
        'posts.active', 'posts.published_at', 'posts.user_id', 'posts.created_at', 
        'posts.updated_at', 'posts.meta_title', 'posts.meta_description', 
        DB::raw('COUNT(likes_dislikes.id) as like_count'))
        
        
        ->where(function($query){
            $query->Where('likes_dislikes.like','=',true);
        })
        ->where('active','=',true)
        ->whereDate('published_at','<=',Carbon::now())
        ->orderByDesc('like_count')
        ->groupBy('posts.id','posts.title','posts.slug','posts.thumbnail','posts.body','posts.active',
        'posts.published_at','posts.user_id','posts.created_at','posts.updated_at','posts.meta_title',
        'posts.meta_description')
        ->limit(9)
        ->get();

        $latestposts = Post::where('active','=',true)
        ->where('published_at','<=',Carbon::now())
        ->latest('published_at')
        ->take(9)
        ->get();

        $user = Auth::user();

        if ($user) {
            $leftJoin = "(SELECT cp.category_id, cp.post_id FROM likes_dislikes JOIN category_post
            cp ON likes_dislikes.post_id = cp.post_id WHERE likes_dislikes.like = 1 and likes_dislikes.user_id
             = ?) as t";

             $recommendedposts = Post::query()
             ->leftJoin('category_post as cp','posts.id','=','cp.post_id')
             ->leftJoin(DB::raw($leftJoin), function($join){
                $join->on('t.category_id','=','cp.category_id')
                ->on('t.post_id','!=','cp.post_id');
             
             })
             ->select('posts.*')
             ->where('posts.id','!=',DB::raw('t.post_id'))
             ->setBindings([$user->id])
             ->limit(9)
             ->get();
        }

        else {
            $recommendedposts = Post::query()
            ->leftJoin('post_views','posts.id','=','post_views.post_id')
            
            
            ->select('posts.id', 'posts.title', 'posts.slug', 'posts.thumbnail', 'posts.body', 
            'posts.active', 'posts.published_at', 'posts.user_id', 'posts.created_at', 
            'posts.updated_at', 'posts.meta_title', 'posts.meta_description', 
            DB::raw('COUNT(post_views.id) as view_count'))
            
            
            ->where('active','=',true)
            ->whereDate('published_at','<=',Carbon::now())
            ->orderByDesc('view_count')
            ->groupBy('posts.id','posts.title','posts.slug','posts.thumbnail','posts.body','posts.active',
            'posts.published_at','posts.user_id','posts.created_at','posts.updated_at','posts.meta_title',
            'posts.meta_description')
            ->limit(9)
            ->get();
            }

        
        return view('home.home',compact('popularposts','latestposts','recommendedposts'));
    }


    public function show_post(Post $post, Request $request)
    {
        $user = Auth::user();

        $postViews = PostView::where('post_id','=',$post->id)->count();
        if ($post) {
            if (!$post->active || !$post->published_at > Carbon::now()) {
                return abort('404'); 
            }

                $cookieName = 'post_view_' . $post->id;

                if (!$request->cookie($cookieName)) {
                    
                    PostView::create([
                        'ip_address'=> $request->ip(),
                        'user_agent'=> $request->userAgent(),
                        'post_id'=> $post->id,
                        'user_id'=>$user?->id
                    ]);
    
                    Cookie::queue($cookieName, true, 60);
    
                    
                   return view('home.show_post',compact('post','postViews')); 
                }

                else {
                    return view('home.show_post',compact('post','postViews'));
                }

                
            
            
        }
            return abort('404');
    }


    public function show_category(Category $category)
    {
        

        if ($category) {
            $posts = Post::query()
            ->join('category_post','posts.id','=','category_post.post_id')
            ->where('category_post.category_id','=',$category->id)
            ->where('active','=',true)
            ->whereDate('published_at','<',Carbon::now())
            ->orderBy('published_at','desc')
            ->paginate(10);
            
            return view('home.show_category',compact('posts','category')); 
            
            
        }
        else {
            return abort('404');
        }
        
        
    }
}
