<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    public $search = '';

    protected $updatesQueryString = ['search'];

    /**
     * Reset pagination when search term is updated.
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $posts = Post::query()
            ->where('is_published', true)
            ->where(function ($query) {
                $query->where('title', 'ilike', '%' . $this->search . '%')
                    ->orWhere('content', 'ilike', '%' . $this->search . '%');
            })
            ->with(['user', 'tags'])
            ->latest('published_at')
            ->paginate(10);
        return $posts;

        return view('livewire.post-list', [
            'posts' => $posts,
        ]);
    }
}
