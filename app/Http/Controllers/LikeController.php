<?php

// app/Http/Controllers/LikeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Auth;

class LikeController extends Controller
{
    public function likeComment($postId) {
    $post = Post::findOrFail($postId);

    // すでにいいねしているかどうか確認
    if ($post->likes()->where('user_id', auth()->id())->exists()) {
        return response()->json(['message' => 'すでにいいねしています']);
    }

    // いいねを保存
    $post->likes()->create([
        'user_id' => auth()->id(),
    ]);

    // Pusherを使ってリアルタイムに他のユーザーに配信
    Pusher::trigger('posts', 'postLiked', [
        'post_id' => $posttId,
        'likes_count' => $post->likes()->count(),
    ]);

    return response()->json(['likes_count' => $post->likes()->count()]);
}

    
//     public function store($postId)
//     {
//         $post = Post::findOrFail($postId);

//         if ($post->likes()->where('user_id', Auth::id())->exists()) {
//             return redirect()->route('communities.show', $post->community_id)->with('error', 'You have already liked this post.');
//         }

//         Like::create([
//             'post_id' => $post->id,
//             'user_id' => Auth::id(),
//         ]);

//         return redirect()->route('communities.show', $post->community_id)->with('success', 'Post liked successfully.');
//     }

//     public function destroy($postId)
//     {
//         $post = Post::findOrFail($postId);

//         $like = $post->likes()->where('user_id', Auth::id())->first();

//         if ($like) {
//             $like->delete();
//             return redirect()->route('communities.show', $post->community_id)->with('success', 'Like removed successfully.');
//         }

//         return redirect()->route('communities.show', $post->community_id)->with('error', 'You have not liked this post.');
//     }
// }