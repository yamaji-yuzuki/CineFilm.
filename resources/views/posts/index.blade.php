<x-app-layout>
<div class="container">
    <h1>Now Playing Movies</h1>
    <div class="row">
        @foreach($movies as $movie)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" class="card-img-top" alt="{{ $movie['title'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie['title'] }}</h5>
                        <p class="card-text">{{ $movie['overview'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</x-app-layout>