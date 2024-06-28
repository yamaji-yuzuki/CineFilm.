<!-- resources/views/communities/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Communities') }}
        </h2>
    </x-slot>

    <div class="container">
    <h1>コミュニティ一覧</h1>
    <a href="{{ route('community.create') }}" class="btn btn-primary">コミュニティを作成</a>
    <div class="row">
        @foreach ($communities as $community)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $community->title }}</h5>
                        <p class="card-text">{{ $community->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
</x-app-layout>