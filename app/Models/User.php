<?php

namespace App\Models;

use Filament\Panel;
use App\Models\Comment;
use Illuminate\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable, HasRoles;

    // ... other properties and methods

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasRole('admin');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
