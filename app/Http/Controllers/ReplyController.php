<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;
use App\Models\Post;
use Auth;

class ReplyController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $post = Post::findOrFail($postId);

        Reply::create([
            'post_id' => $post->id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return redirect()->route('communities.show', $post->community_id)->with('success', 'Reply created successfully.');
    }

    public function destroy($id)
    {
        $reply = Reply::findOrFail($id);
        $communityId = $reply->post->community_id;

        $reply->delete();

        return redirect()->route('communities.show', $communityId)->with('success', 'Reply deleted successfully.');
    }
}