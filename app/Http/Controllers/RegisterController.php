<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function store()
    {

        $attributes = request()->validate([
            'name'      => ['required', 'max:255', Rule::unique('users', 'name')],
            'email'     => ['required', 'email', Rule::unique('users', 'email'), 'max:255'],
            'password'  => ['required', 'max:255', 'min:7']
        ], [
            'required'  => 'Este campo es requerido y no puede quedar en blanco.',
            'max'       => 'Este campo no puede tener mas de :max caracteres.',
            'email'     => 'El correo electrónico debe tener un formato valido.',
            'unique'    => 'Ya fue tomado, intente con otro distinto.',
            'min'       => 'El campo debe tener al menos :min caracteres.'
        ]);

        $attributes['slug'] = Str::slug($attributes['name']);

        $user = User::create($attributes);

//      Inicia la sesión del usuario recién generado
        auth()->login($user);

//      session()->flash('exito', 'Tu cuenta ha sido creada.');
        return redirect('/')->with('exito', 'Tu cuenta ha sido creada');
    }

    public function create()
    {

        return view('register.create');
    }

}
