<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function comments()
    {
        return $this->belongsTo(Comment::class);
    }

    public function blogs()
    {
        return $this->belongsTo(Blog::class);
    }
}
