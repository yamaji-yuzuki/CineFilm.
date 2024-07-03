<!-- resources/views/community/show.blade.php -->

<x-app-layout>
     <h5 class="card-title">{{ $movie['title'] }}</h5>
     <p class="card-text">{{ $movie['overview'] }}</p>
@section('content')
    <div class="container">
        <h1>映画ID: {{ $id }} のコミュニティページ</h1>
        <!-- コミュニティページの内容 -->
    </div>
@endsection
</x-app-layout>