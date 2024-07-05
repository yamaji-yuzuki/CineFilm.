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

                    <div class="mt-6">
                        <h4 class="text-lg font-bold mb-4">Posts</h4>
                        @foreach ($community->posts as $post)
                            <div class="mb-4 p-4 bg-gray-100 rounded">
                                <p>{{ $post->content }}</p>
                                <div class="text-sm text-gray-600">
                                    Posted by {{ $post->user->name }} on {{ $post->created_at->format('M d, Y') }}
                                </div>
                                <div class="mt-2 flex items-center">
                                    <form action="{{ route('likes.store', $post->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mr-2">
                                            Like ({{ $post->likes->count() }})
                                        </button>
                                    </form>
                                    <form action="{{ route('likes.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                            Unlike
                                        </button>
                                    </form>
                                </div>
                                <div class="mt-2">
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                                <div class="mt-2">
                                    <h5 class="text-md font-bold mb-2">Replies</h5>
                                    <form action="{{ route('replies.store', $post->id) }}" method="POST">
                                        @csrf
                                        <div>
                                            <textarea id="reply-content" name="content" rows="2" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm"></textarea>
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                                Reply
                                            </button>
                                        </div>
                                    </form>
                                    @foreach ($post->replies as $reply)
                                        <div class="mt-2 p-2 bg-gray-200 rounded">
                                            <p>{{ $reply->content }}</p>
                                            <div class="text-sm text-gray-600">
                                                Replied by {{ $reply->user->name }} on {{ $reply->created_at->format('M d, Y') }}
                                            </div>
                                            <div class="mt-2">
                                                <form action="{{ route('replies.destroy', $reply->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>