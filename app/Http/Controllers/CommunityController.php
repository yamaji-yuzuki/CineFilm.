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
    
    public function show(Community $id)
    {
        // // TMDb APIキーを取得
        // $apiKey = config('services.tmdb.api_key');

        // // TMDb APIからデータを取得
        // $response = Http::get("https://api.themoviedb.org/3/movie/now_playing?api_key={$apiKey}");
        
        // if ($response->successful()) {
        //     $movies = $response->json()['results'];
        //     $movies = array_search($id, array_column( $movies,'id'));
        // } else {
        //     $movies = array_search($id, array_column( $movies,'id'));
        // }

        // // ビューにデータを渡す
        // return view('dashboard', compact('movies'));
        // dd($movie);
        // return view('community');
    }
}