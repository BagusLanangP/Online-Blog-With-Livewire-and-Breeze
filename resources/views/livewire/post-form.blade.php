<div>
    <form wire:submit.prevent="save">
      <div class="mb-4">
        <h1 class="text-center font-bold text-4xl bg-gradient-to-r from-blue-500 to-teal-400  text-transparent mb-2 bg-clip-text">
          {{ $post ? 'Update Post' : 'Create Post' }}
        </h1>
        <hr>
      </div>
      <div class="mb-4">
        <label for="title" class="text-gray-700 mb-2 block font-bold">Title</label>
        <input
          wire:model="title"
          type="text"
          id="title"
          class="text-gray-700 w-full rounded-sm border-gray-300 px-3 py-2 focus:outline-none"
          required
        />
        @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
      </div>
      <div class="mb-4">
        <label for="image" class="text-gray-700 mb-2 block font-bold">Upload Image</label>
        <input
            wire:model="image"
            type="file"
            id="image"
            class="text-gray-700 w-full rounded-sm border-gray-300 py-2 focus:outline-none"
            accept="image/*"
        />
        @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    
  
      <div class="mb-4">
        <label for="content" class="text-gray-700 mb-2 block font-bold">Content</label>
        <textarea
          wire:model="content"
          id="content"
          rows="6"
          class="text-gray-700 w-full rounded-sm border-gray-300 px-3 py-2 focus:outline-none"
          required
        ></textarea>
        @error('content') <span class="text-red-500">{{ $message }}</span> @enderror
      </div>
  
      {{-- <div class="mb-4">
        <label class="text-gray-700 mb-2 block font-bold">Tags</label>
        <div class="flex flex-wrap gap-2">
          @foreach($allTags as $tag)
          <label class="inline-flex items-center">
            <input
              type="checkbox"
              wire:model="selectedTags"
              value="{{ $tag->id }}"
              class="form-checkbox text-blue-600 h-5 w-5"
            />
            <span class="text-gray-700 ml-2">{{ $tag->name }}</span>
          </label>
          @endforeach
        </div>
      </div> --}}
  
      {{-- <x-primary-button class="ms-3">
        {{ $post ? 'Update Post' : 'Create Post' }}
      </x-primary-button> --}}
      <x-store-button>
        {{ $post ? 'Update Post' : 'Create Post' }}
      </x-store-button>
    </form>
  </div>