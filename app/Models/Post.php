<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'is_published', 'published_at'];

    public function user()
    {
        // Using the `belongsTo` relationship to get the user who created the post
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        // Using the `hasMany` relationship to get all comments for a post
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        // Using the `belongsToMany` relationship to get all tags associated with a post
        return $this->belongsToMany(Tag::class);
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->published_at)->translatedFormat('d F Y');
    }

    //relasi ke tabel like
    public function like(){
        return $this->hasMany(Like::class);
    }
}