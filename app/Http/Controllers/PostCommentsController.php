<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        // Valida el formulario
        $attributes = request()->validate([
            'body' => ['required']
        ], [
            'required' => 'El campo no puede estar vacío.'
        ]);

        // Agrega un comentario a un post determinado
        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);

         // Redirige al post
        return back()->with('exito', 'Tú comentario fué publicado con éxito.');
    }
}
