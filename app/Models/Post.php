<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    #to get owner of the post
    public function user()
        {
            return $this->belongsTo(User::class);
        }

        // A post has many comments
        // This method retrieves all the comments of a post
        public function comments()
        {
            return $this->hasMany(Comment::class);
        }

}
