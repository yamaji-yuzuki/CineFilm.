<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;
use App\Models\Post;
use Auth;

class RepliesController extends Controller
{
  // only()の引数内のメソッドはログイン時のみ有効
  public function __construct()
  {
    $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
  }


 /**
  * 引数のIDに紐づくリプライにLIKEする
  *
  * @param $id リプライID
  * @return \Illuminate\Http\RedirectResponse
  */
  public function like($id)
  {
    Like::create([
      'reply_id' => $id,
      'user_id' => Auth::id(),
    ]);

    session()->flash('success', 'You Liked the Reply.');

    return redirect()->back();
  }

  /**
   * 引数のIDに紐づくリプライにUNLIKEする
   *
   * @param $id リプライID
   * @return \Illuminate\Http\RedirectResponse
   */
  public function unlike($id)
  {
    $like = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();
    $like->delete();

    session()->flash('success', 'You Unliked the Reply.');

    return redirect()->back();
  }

...

// }


// class ReplyController extends Controller
// {
//     public function store(Request $request, $postId)
//     {
//         $request->validate([
//             'content' => 'required|string|max:1000',
//         ]);

//         $post = Post::findOrFail($postId);

//         Reply::create([
//             'post_id' => $post->id,
//             'user_id' => Auth::id(),
//             'content' => $request->content,
//         ]);

//         return redirect()->route('communities.show', $post->community_id)->with('success', 'Reply created successfully.');
//     }

//     public function destroy($id)
//     {
//         $reply = Reply::findOrFail($id);
//         $communityId = $reply->post->community_id;

//         $reply->delete();

//         return redirect()->route('communities.show', $communityId)->with('success', 'Reply deleted successfully.');
//     }
// }