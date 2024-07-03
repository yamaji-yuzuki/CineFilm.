<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index()
    {
        $apiKey = config('services.tmdb.api_key');
        $response = Http::get("https://api.themoviedb.org/3/movie/now_playing?api_key={$apiKey}&language=ja-JP");
        $movies = $response->json()['results'];

        return view('dashboard', compact('movies'));
    }

    public function show($id)
    {
        $apiKey = config('services.tmdb.api_key');
        $response = Http::get("https://api.themoviedb.org/3/movie/{$id}?api_key={$apiKey}&language=ja-JP&append_to_response=videos");
        $movie = $response->json();

        return view('movie.show', compact('movie'));
    }
}
