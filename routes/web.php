<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\PostController;

Route::get('/', function () {return view('welcome');});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';

Route::get('/categories/{category}', [CategoryController::class,'index'])->middleware("auth");

Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movie.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/community', [CommunityController::class, 'index'])->name('community');
});

Route::resource('communities', CommunityController::class);

Route::get('/community/{post}', [CommunityController::class, 'show'])->name('community.show');
Route::get('/community/{id}', [CommunityController::class, 'show'])->name('community.show');
Route::delete('/community/{community}', [CommunityController::class, 'destroy'])->name('/community/');

Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movie.show');

Route::post('communities/{community}/posts', [PostController::class, 'store'])->name('posts.store');
Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

require __DIR__.'/auth.php';