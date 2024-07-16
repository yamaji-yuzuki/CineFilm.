<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    // マスアサインメントを許可するフィールドを指定
    protected $fillable = [
        'name',
        'description',
        // 他のフィールドも追加
    ];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // public function show($id) 
    // {
    //     // TMDb APIキーを取得
    //     $apiKey = config('services.tmdb.api_key');

    //     // TMDb APIからデータを取得
    //     $response = Http::get("https://api.themoviedb.org/3/movie/now_playing?api_key={$apiKey}");
        
    //     if ($response->successful()) {
    //         $movies = $response->json()['results'];
    //     } else {
    //         $movies = [];
    //     }
    // }
}