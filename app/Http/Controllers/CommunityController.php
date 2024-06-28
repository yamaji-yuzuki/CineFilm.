<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = Community::all();
        return view('community.index', compact('communities'));
    }

    public function create()
    {
        return view('community.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Community::create($request->all());

        return redirect()->route('community.index')
                         ->with('success', 'Community created successfully.');
    }
}