<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = Community::all();
        return view('communities.index', compact('communities'));
    }
    
    public function create()
    {
        return view('communities.create');
    }
   
     public function show($id)
    {
        $user=Auth::id();
        
        $community = Community::with('posts.replies', 'posts.likes', 'posts.user')->findOrFail($id);
        
        // IDに基づいてコミュニティを取得し、関連データをEagerロード
        $community = Community::with(['posts' => function($query) {
            $query->orderBy('created_at', 'desc'); // 投稿を降順（最新順）で取得
        }, 'posts.replies', 'posts.likes', 'posts.user'])->findOrFail($id);
        
        // コミュニティに関連する投稿を取得（すでにEagerロードされているため、追加のクエリは不要）
        $posts = $community->posts;
        
        return view('communities.show', compact('community', 'posts', 'user'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $data = $request->except('_token');

        // コミュニティを作成
        $community = Community::create($data);

        return redirect()->route('communities.index')->with('success', 'Community created successfully.');
    }
    
    public function destroy(Community $community)
    {
        $community->delete();
        return redirect()->route('communities.index')->with('success', 'Community deleted successfully.');
    }
}