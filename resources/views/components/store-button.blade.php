{{-- <button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-sky-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button> --}}

<button type="submit" class="inline-flex px-4 py-2 rounded-md bg-blue-400 items-center border border-transparent  font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-600 transition ease-in-out duration-150 focus:outline-none">
    {{ $slot }}
</button>