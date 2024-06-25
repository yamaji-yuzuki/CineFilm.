<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Now Playing Movies') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach($movies as $movie)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="w-full h-auto">
                <div class="p-4">
                    <h3 class="font-semibold text-lg">{{ $movie['title'] }}</h3>
                    <p class="text-sm text-gray-600">Rating: {{ $movie['vote_average'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>

