<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_text'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function like(){
        return $this->hasMany(Like::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function post_media(){
        return $this->hasMany(post_media::class);
    }
}
