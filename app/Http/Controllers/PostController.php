<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('home', [
            'posts' => Post::with('category')->latest('id')->filter(request(['search']))->get(),
            'categories' => $categories,
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'post' => $post,
        ]);
    }
}
