<div>
    <div class="bg-yellow-300 text-white rounded-md p-2">
        <p>{{ $countLikes }} Likes</p>
    </div>
    <button wire:click="addLike" class=" bg-red-500 rounded-sm">
        @if($like)
            <span>Unlike</span>
        @else
            <span>Like</span>
        @endif
    </button>  
</div>
