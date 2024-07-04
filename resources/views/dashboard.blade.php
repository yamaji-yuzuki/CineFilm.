<!-- resources/views/dashboard.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Now Playing Movies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-3 gap-4">
                        @foreach($movies as $movie)
                            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                <img class="w-full" src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2">
                                        <a href="{{ route('movie.show', $movie['id']) }}" class="text-blue-500 hover:underline">
                                            {{ $movie['title'] }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
