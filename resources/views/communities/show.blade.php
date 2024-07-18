<!-- resources/views/communities/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $community->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">{{ $community->name }}</h3>
                    <p>{{ $community->description }}</p>

                    <div class="mt-6">
                        <form action="{{ route('posts.store', $community->id) }}" method="POST">
                            @csrf
                            <div>
                                <label for="content" class="block text-sm font-medium text-gray-700">New Post</label>
                                <textarea id="content" name="content" rows="3" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm"></textarea>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Post
                                </button>
                            </div>
                        </form>
                    </div>
                    <br />
                    @foreach ($posts as $post)
                        @if(Auth::id() == $post->user->id)
                           <div class="flex justify-left items-center gap-4 text-green-500">
                              <h2>{{ $post->title }}</h2>
                              <p>{{ $post->user->name }}  :  </p><p class="font-semibold">{{ $post->content }}</p>
                              <div class="text-sm text-gray-600">
                                  {{ $post->created_at->format('M d, Y') }}
                              </div>
                              <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold rounded" onclick="deletePost({{ $post->id }})">
                                      Delete
                                  </button>
                               </form>
                           </div>
                        @else
                           <div class="flex justify-left items-center gap-4">
                              <h2>{{ $post->title }}</h2>
                              <p>{{ $post->user->name }}  :  </p><p class="font-semibold">{{ $post->content }}</p>
                           <div class="text-sm text-gray-600">
                              {{ $post->created_at->format('M d, Y') }}
                           </div>
                           </div>
                        @endif
                    @endforeach
            </div>
        </div>
    </div>
    <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }}
    </script>
</x-app-layout>