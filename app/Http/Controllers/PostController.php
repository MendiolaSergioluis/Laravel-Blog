<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->latest('id');
        if(request('search')){
            $posts
            ->where('title', 'like', '%'. request('search').'%')
            ->orWhere('title', 'like', '%'. request('search').'%')
            ->orWhere('excerpt', 'like', '%'. request('search').'%');
        }
        $categories = Category::all();
        return view('home', [
            'posts' => $posts->get(),
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
