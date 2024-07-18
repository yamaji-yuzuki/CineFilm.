<!-- resources/views/movie/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movie Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-wrap">
                        <!-- 左半分: サムネイルとタイトル -->
                        <div class="w-full lg:w-1/3 pr-4 mb-4 lg:mb-0">
                            <div class="rounded overflow-hidden shadow-lg h-full flex flex-col">
                                <img class="w-full h-96 object-cover" src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}">
                                <div class="px-6 py-4 flex-1">
                                    <div class="font-bold text-xl mb-2">{{ $movie['title'] }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- 右半分: あらすじと最新の予告編 -->
                        <div class="w-full lg:w-2/3 pl-4 flex flex-col justify-between">
                            <div class="flex-1">
                                <p class="text-gray-700 text-base mb-4">
                                    {{ $movie['overview'] }}
                                </p>
                            </div>
                            @if ($trailer)
                                <div class="mt-4">
                                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $trailer['key'] }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            @endif
                        <!-- 右側のカラム -->
                        <!-- 予告編を表示 -->
                        @if(isset($movie['videos']['results']))
                            <div class="mt-4">
                                <h2 class="text-xl font-bold mb-2">予告編</h2>
                                @foreach($movie['videos']['results'] as $video)
                                    @if($loop->index) <!-- 最初の予告編を表示 -->
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
