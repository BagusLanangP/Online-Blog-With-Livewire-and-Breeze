<div>
    <button wire:click="seeLike" class=" bg-red-500 rounded-sm">
        @isset($like)
            <span>Unlike</span>
        @else
            <p>Like</p>
        @endisset
    </button>  
</div>
