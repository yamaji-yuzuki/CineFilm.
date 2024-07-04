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
        $response = Http::get("https://api.themoviedb.org/3/movie/{$id}?api_key={$apiKey}&language=ja-JP");
        $movie = $response->json();

        $videosResponse = Http::get("https://api.themoviedb.org/3/movie/{$id}/videos?api_key={$apiKey}&language=ja-JP");
        $videos = $videosResponse->json()['results'];

        // 最新の予告編を一つだけ取得
        $trailer = collect($videos)->firstWhere('type', 'Trailer');

        return view('movie.show', compact('movie', 'trailer'));
    }
}