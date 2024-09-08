<?php

namespace App\Livewire;

use App\Models\Like;
use App\Models\Post;
use Livewire\Component;

class LikeComponent extends Component
{
    public $post;
    public $liked = false;

    public function mount(Post $post)
    {
        $this->post = $post;
        
        // Tentukan apakah post sudah di-like oleh user saat ini
        if (auth()->check()) {
            $this->liked = Like::where('post_id', $this->post->id)
                               ->where('user_id', auth()->id())
                               ->exists();
        }
    }

    public function addLike()
    {
        if (auth()->check()) {
            if ($this->liked) {
                Like::where('post_id', $this->post->id)
                    ->where('user_id', auth()->id())
                    ->delete();
            } else {
                Like::create(['post_id' => $this->post->id, 'user_id' => auth()->id()]);
            }

            $this->liked = !$this->liked;
        }
    }

    public function render()
    {
        $countLikes = Like::where('post_id', $this->post->id)->count();
        return view('livewire.like-component', [
            'like' => $this->liked,
            'countLikes' => $countLikes
        ]);
    }
}
