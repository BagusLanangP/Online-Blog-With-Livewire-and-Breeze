<div class="container">
    <div class="bg-yellow-300 text-white rounded-md p-2">
        <p>{{ $countShare }} Shares</p>
    </div>

    <button wire:click="share" class="btn btn-primary">Share Post</button>

    @if (session()->has('message'))
        <div class="alert alert-success mt-2">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger mt-2">
            {{ session('error') }}
        </div>
    @endif
</div>
