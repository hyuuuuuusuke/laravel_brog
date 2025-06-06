<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // A comment belongs to a user
    // This method retrieves the owner of the comment
    public function user(){
        return $this->belongsTo(User::class);
    }


}
