<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::latest('id')->paginate(5),
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $attributes = $this->validatePost();
        $attributes['slug'] = Str::slug($attributes['title']);
        $attributes['user_id'] = auth()->id();

        // Aquí se añade la ruta a la base de datos
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        Post::create($attributes);

        return redirect('/')->with('exito', 'Tu articulo ha sido creado satisfactoriamente.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        $attributes['user_id'] = auth()->id();

        $post->update($attributes);

        return back()->with('exito', 'Tú artículo fué editado correctamente.');
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('exito', 'Tú artículo fué eliminado correctamente.');
    }

    protected function validatePost(?Post $post = null): array
    {
        $post ?? new Post();

        return request()->validate([
            'title' => ['required', Rule::unique('posts', 'title')->ignore($post)],
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'excerpt' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ], [
            'required' => 'Este campo es requerido y no puede quedar en blanco.',
            'unique' => 'Ya fue tomado, intente con otro distinto.',
            'category_id.exist' => 'Esa categoría no existe, intente nuevamente.',
            'category_id.required' => 'Debe seleccionar una categoría.'
        ]);
    }
}
