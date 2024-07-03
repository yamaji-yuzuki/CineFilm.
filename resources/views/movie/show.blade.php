<!-- resources/views/movie/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movie Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-20">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2 gap-4">
                        <!-- 左側のカラム -->
                        <div class="flex flex-col items-center">
                            <img class="w-1/2" src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}"><br />
                            <h1 class="mt-4 text-3xl font-bold">{{ $movie['title'] }}</h1><br />
                            <p class="text-gray-700 text-base mb-4">{{ $movie['overview'] }}</p>
                        </div>
                        <!-- 右側のカラム -->
                        <!-- 予告編を表示 -->
                        @if(isset($movie['videos']['results']) && count($movie['videos']['results']) > 0)
                            <div class="mt-4">
                                <h2 class="text-xl font-bold mb-2">予告編</h2>
                                @foreach($movie['videos']['results'] as $video)
                                    @if($loop->index < 3) <!-- 最初の3つの予告編を表示 -->
                                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $video['key'] }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="mb-4"></iframe>
                                     @endif
                                @endforeach
                            </div>
                        @else
                            <p>予告編がありません。</p>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
