<?php

namespace App\Http\Controllers;

class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('exito', 'Chao! Hasta la próxima.');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email'     => ['required', 'email', 'max:255'],
            'password'  => ['required', 'max:255', 'min:7']
        ], [
            'required'  => 'Este campo es requerido y no puede quedar en blanco.',
            'max'       => 'Este campo no puede tener mas de :max caracteres.',
            'email'     => 'El correo electrónico debe tener un formato valido.',
            'min'       => 'El campo debe tener al menos :min caracteres.'
        ]);

        if (auth()->attempt($attributes)) {
            // IMPORTANTE: Siempre se debe regenerar la sesión.
            session()->regenerate();

            return redirect('/')->with('exito', 'Hola nuevamente.');
        }

        return back()
            ->withInput()
            ->withErrors(['email' => 'Estas credenciales no son validas']);
    }
}
