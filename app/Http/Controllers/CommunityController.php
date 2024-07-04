<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;

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