<!-- resources/views/dashboard.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Popularity Ranking') }}
        </h2>
    </x-slot>

<body>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-5 gap-6">
                        @foreach($movies as $movie)
                            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                <img class="w-full" src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2">
                                        <a href="{{ route('movie.show', $movie['id']) }}" class="text-blue-500 hover:underline">
                                            {{ $movie['title'] }}
                                        </a>
                                        <!--<div class="font-size:300% color:#a09a9a">-->
                                        <!--    <span class="stars" id="{{ $movie['id'] }}1" value="{{ $movie['id'] }}" data-id="{{ $movie['id'] }}">★</span>-->
                                        <!--    <span class="stars" id="{{ $movie['id'] }}2" value="{{ $movie['id'] }}" data-id="{{ $movie['id'] }}">★</span>-->
                                        <!--    <span class="stars" id="{{ $movie['id'] }}3" value="{{ $movie['id'] }}" data-id="{{ $movie['id'] }}">★</span>-->
                                        <!--    <span class="stars" id="{{ $movie['id'] }}4" value="{{ $movie['id'] }}" data-id="{{ $movie['id'] }}">★</span>-->
                                        <!--    <span class="stars" id="{{ $movie['id'] }}5" value="{{ $movie['id'] }}" data-id="{{ $movie['id'] }}">★</span> -->
                                        <!--</div>-->
                                        <div class="font-size:300% color:#a09a9a rating">
                                          <span class="star" id="1">★</span>
                                          <span class="star" id="2">★</span>
                                          <span class="star" id="3">★</span>
                                          <span class="star" id="4">★</span>
                                          <span class="star" id="5">★</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script>
          document.addEventListener("DOMContentLoaded", () => {
            const ratings = document.querySelectorAll(".rating");
            
            ratings.forEach((rating) => {
              const stars = rating.querySelectorAll(".star");
              let clicked = false;
              
              stars.forEach((star, i) => {
                star.addEventListener("mouseover", () => {
                  if (!clicked) {
                    for (let j = 0; j <= i; j++) {
                      stars[j].style.color = "#f0da61";
                    }
                  }
                });
          
                star.addEventListener("mouseout", () => {
                  if (!clicked) {
                    for (let j = 0; j < stars.length; j++) {
                      stars[j].style.color = "#a09a9a";
                    }
                  }
                });
          
                star.addEventListener("click", () => {
                  clicked = true;
                  for (let j = 0; j <= i; j++) {
                    stars[j].style.color = "#f0da61";
                  }
                  for (let j = i + 1; j < stars.length; j++) {
                    stars[j].style.color = "#a09a9a";
                  }
                });
              });
            });
          });
        </script>
</body>
</x-app-layout>
