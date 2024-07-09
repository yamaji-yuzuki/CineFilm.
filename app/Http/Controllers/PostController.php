<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request, $communityId)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $post = new Post();
        $post->content = $request->input('content');
        $post->user_id = Auth::id();
        $post->community_id = $communityId;
        $post->save();

        return redirect()->route('communities.show', $communityId)->with('success', 'Post created successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // ポリシーによる認可チェック
        $this->authorize('delete', $post);

        $post->delete();

        return back()->with('success', 'Post deleted successfully.');
    }
}