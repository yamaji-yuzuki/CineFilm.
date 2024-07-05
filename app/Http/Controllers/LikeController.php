<?php

// app/Http/Controllers/LikeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Auth;

class LikeController extends Controller
{
    public function store($postId)
    {
        $post = Post::findOrFail($postId);

        if ($post->likes()->where('user_id', Auth::id())->exists()) {
            return redirect()->route('communities.show', $post->community_id)->with('error', 'You have already liked this post.');
        }

        Like::create([
            'post_id' => $post->id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('communities.show', $post->community_id)->with('success', 'Post liked successfully.');
    }

    public function destroy($postId)
    {
        $post = Post::findOrFail($postId);

        $like = $post->likes()->where('user_id', Auth::id())->first();

        if ($like) {
            $like->delete();
            return redirect()->route('communities.show', $post->community_id)->with('success', 'Like removed successfully.');
        }

        return redirect()->route('communities.show', $post->community_id)->with('error', 'You have not liked this post.');
    }
}