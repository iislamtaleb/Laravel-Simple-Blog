<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikesDislikes extends Model
{
    use HasFactory;

    protected $fillable = ['like','post_id','user_id']; 
}
