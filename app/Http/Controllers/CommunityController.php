<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use Illuminate\Support\Facades\Http;

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
            'title' => 'required',
            'description' => 'required',
        ]);

        Community::create($request->all());

        return redirect()->route('community.index')
                         ->with('success', 'Community created successfully.');
    }
    
    public function show($id)
    {
        // TMDb APIキーを取得
        $apiKey = config('services.tmdb.api_key');
        // // TMDb APIからデータを取得
        $response = Http::get("https://api.themoviedb.org/3/movie/{$id}?api_key={api_key}");
        
        if ($response->successful()) {
            $movie = $response->json()['results'];
        
        } else {
            $movie = [];
        }

         // ビューにデータを渡す
         return view('communities.show',compact('movie'));
    }
}