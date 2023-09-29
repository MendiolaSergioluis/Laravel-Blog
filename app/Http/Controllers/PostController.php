<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index()
    {

        return view('posts.index', [
            'posts' => Post::with('category', 'author', 'comments')
                ->latest('id')
                ->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', Rule::unique('posts', 'title')],
            'thumbnail'=> ['required', 'image'],
            'excerpt' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ], [
            'required' => 'Este campo es requerido y no puede quedar en blanco.',
            'unique' => 'Ya fue tomado, intente con otro distinto.',
            'category_id.exist' => 'Esa categoría no existe, intente nuevamente.',
            'category_id.required'=>'Debe seleccionar una categoría.'
        ]);
        $attributes['slug'] = Str::slug($attributes['title']);
        $attributes['user_id'] = auth()->id();

        // Aquí se añade la ruta a la base de datos
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        Post::create($attributes);

        return redirect('/')->with('exito', 'Tu articulo ha sido creado satisfactoriamente.');
    }
}
