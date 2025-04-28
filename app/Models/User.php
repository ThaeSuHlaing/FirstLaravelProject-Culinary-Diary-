<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Collection; 
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password']=bcrypt($value);
    }

    public function subscribedBlogs()
    {
        return $this->belongsToMany(Blog::class);
    }

    public function isSubscribed($blog)
    {
        return auth()->user()->subscribedBlogs && auth()->user()->subscribedBlogs->contains('id', $blog->id);
    }
}
