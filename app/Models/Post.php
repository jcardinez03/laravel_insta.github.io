<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    // Post - User
    // A post belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    // Post - Category
    // to get the categories under a post
    public function categoryPost()
    {
        return $this->hasMany(CategoryPost::class);
    }

    // POST - COMMENT
    // to get all the comments under a post
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // to get the llkes of a post
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Return TRUE if the Auth user has already liked a post
    public function isLiked()
    {
        return $this->likes()->where('user_id', Auth::user()->id)->exists();
    }
}
