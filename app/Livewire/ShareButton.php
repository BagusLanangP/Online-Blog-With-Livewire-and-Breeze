<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Share;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ShareButton extends Component
{
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function share()
    {
        // Periksa apakah user sudah login
        if (Auth::check()) {
            $user = Auth::user();

            // Cek apakah user sudah pernah share post ini
            $existingShare = Share::where('user_id', $user->id)
                                  ->where('post_id', $this->post->id)
                                  ->first();

            if (!$existingShare) {
                // Buat share baru
                Share::create([
                    'user_id' => $user->id,
                    'post_id' => $this->post->id,
                ]);

                session()->flash('message', 'Post shared successfully!');
            } else {
                session()->flash('error', 'You have already shared this post.');
            }
        } else {
            session()->flash('error', 'You need to login to share this post.');
        }
    }

    public function render()
    {
        // Hitung total shares untuk post ini
        $countShare = Share::where('post_id', $this->post->id)->count();

        return view('livewire.share-button', [
            'countShare' => $countShare
        ]);
    }
}
