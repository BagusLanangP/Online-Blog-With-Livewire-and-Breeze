<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Share;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ShareButton extends Component
{

    public function share()
    {
        // Periksa apakah user sudah login
        if (Auth::check()) {
            $user = Auth::user();

            // Buat share baru
            Share::create([
                'user_id' => 1,
                'post_id' => 1,
            ]);

            session()->flash('message', 'Post shared successfully!');
        } else {
            session()->flash('error', 'You need to login to share this post.');
        }
    }
    public function render()
    {
        return view('livewire.share-button');
    }
}
