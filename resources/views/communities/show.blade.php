<!-- resources/views/communities/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $community->name }}
        </h2>
        <a class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-1 px-3 border border-gray-400 rounded shadow" href="{{ route('communities.index') }}">Back</a>
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
                                  <button type="submit" class="hover:bg-red-500 text-white font-bold rounded" onclick="return deletePost({{ $post->id }})">
                                    🗑
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
                           <!--<div class="hover:bg-pink-400 text-red font-bold rounded">-->
                           <!--    <button class="like-button" data-post-id="{{ $post->id }}">-->
                           <!--         ♥ <span class="like-count">{{ $post->likes->count() }}</span>-->
                           <!--    </button>-->
                           <!--</div>-->
                           </div>
                        @endif
                    @endforeach
            </div>
        </div>
    </div>
    <!--@section('scripts')-->
    <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
    <!--<script>-->
    <!--    $(document).on('click', '.like-button', function() {-->
    <!--    const postId = $(this).data('post-id');-->
    
    <!--    $.ajax({-->
    <!--        url: '/communities/',-->
    <!--        type: 'POST',-->
    <!--        success: function(response) {-->
    <!--            // 成功したら、いいね数を更新する-->
    <!--            $(`.like-button[data-post-id="${postId}"] .like-count`).text(response.likes_count);-->
    <!--        }-->
    <!--        });-->
    <!--    });-->
    <!--</script>-->
    <!--<script>-->
    <!--    var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {-->
    <!--        cluster: '{{ env('PUSHER_APP_CLUSTER') }}'-->
    <!--    });-->
        
        // チャンネルにサブスクライブ
    <!--    var channel = pusher.subscribe('posts');-->
    <!--    channel.bind('postLiked', function(data) {-->
    <!--        // コメントIDに基づいて、いいね数を更新-->
    <!--        $(`.like-button[data-post-id="${data.post_id}"] .like-count`).text(data.likes_count);-->
    <!--    });-->
    <!--</script>-->
    <!--@endsection-->
    <script>
        function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
            return true; 
            }else{
                alert('キャンセルされました'); 
                return false; 
            }
        }
    </script>
</x-app-layout>