<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    @foreach($posts as $post)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-sm">
                <div class=" text-gray-900">
                    <div>
                        <div class="header mb-4  p-3">
                            <h3 class="text-center">{{ $post->title }}</h3>                            
                            <p class=" text-start">
                                {{  $post->formatted_date }}
                            </p>
                            <p>
                                {{ $post->user->name }}</p>
                            <hr class=" mt-1">
                        </div>
                        <div class="content p-3">
                            <p>{{ $post->content }}</p>
                        </div>
                        <div class="option p-3">
                            {{-- @livewire('like', ['post' => $post->id]) --}}
                            @livewire('like-component', ['post' => $post->id])
                        </div>
                        <div class="option p-3">
                            @livewire('share-button', ['post' => $post->id])
                            {{-- <livewire:share-post :post-id="$post->id" /> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
</x-app-layout>
