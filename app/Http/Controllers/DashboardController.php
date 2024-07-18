<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        // TMDb APIキーを取得
        $apiKey = config('services.tmdb.api_key');

        // TMDb APIからデータを取得
        $response = Http::get("https://api.themoviedb.org/3/movie/now_playing?api_key={$apiKey}");
        
        if ($response->successful()) {
            $movies = $response->json()['results'];
        } else {
            $movies = [];
        }

        // ビューにデータを渡す
        return view('dashboard', compact('movies'));
    }
}