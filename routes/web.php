<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('home', [
        'posts' => $category->posts->load(['category', 'author'])
    ]);
});

Route::get('/authors/{author:slug}', function (User $author) {
    return view('home', [
        'posts' => $author->posts->load(['category', 'author'])
    ]);
});