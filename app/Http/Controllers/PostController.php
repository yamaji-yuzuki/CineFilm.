<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PostController extends Controller
{
    // public function index()
    // {
    //     try {
    //         $client = new Client();
    //         $response = $client->get('https://api.themoviedb.org/3/movie/now_playing', [
    //             'query' => [
    //                 'api_key' => env('TMDB_API_KEY'),
    //                 'language' => 'en-US',
    //                 'page' => 1
    //             ]
    //         ]);

    //         $movies = json_decode($response->getBody(), true)['results'];

    //         return view('dashboard', compact('movies'));
    //     } catch (\Exception $e) {
    //         return view('dashboard')->withErrors('Failed to retrieve movies.');
    //     }
    // }
}
