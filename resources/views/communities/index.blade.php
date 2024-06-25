<!-- resources/views/communities/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Communities') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($communities as $community)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-4">
                    <h3 class="font-semibold text-lg">{{ $community->name }}</h3>
                    <p class="text-gray-600">{{ $community->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>