<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
    $apiKey = 'b320f09ca4e0a4e9aacb8425cc1d6904';
    $response = Http::get("https://api.themoviedb.org/3/movie/now_playing", [
        'api_key' => $apiKey,
        'language' => 'en-US', // デフォルト言語を指定
        'page' => 1, // ページ番号
    ]);

    $movies = $response->json()['results'];

    return view('dashboard', compact('movies'));
    }
}
