<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;





class Post extends Model 
{
    use HasFactory;

    protected $fillable = ['title','slug','thumbnail','body','active','published_at','user_id',
    'meta_title','meta_description']; 

    protected $casts = ['published_at'=>'datetime']; 


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getShortPostTitle()
    {
        $short_title = Str::limit($this->title, 50, '...');
        return  $short_title;
    }



    public function getShortPostDesc()
    {
        $short_desc = Str::limit($this->body, 50, '...');
        return  $short_desc;
    }




    public function getDate()
    {
        return $this->published_at->format('F jS Y');
    }



}
