<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Now Playing Movies') }}
        </h2>
    </x-slot>
    
<div class="container">
    <h1>上映中の映画ランキング</h1>
    @if (isset($movies))
        <div class="row">
            @foreach ($movies as $movie)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="card-img-top" alt="{{ $movie['title'] }}">
                        <div class="card-body">
                            <a href="/community/{{ $movie['id'] }}" class="card-title">{{ $movie['title'] }}</a>
                            <p class="card-text">{{ $movie['overview'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No movies available</p>
    @endif
</div>
</x-app-layout>

