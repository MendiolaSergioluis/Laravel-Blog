<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionRequest;

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

    public function store( SessionRequest $request)
    {
        $attributes = $request->validated();

        if (auth()->attempt((array) $attributes)) {
            // IMPORTANTE: Siempre se debe regenerar la sesión.
            session()->regenerate();

            return redirect('/')->with('exito', 'Hola nuevamente.');
        }

        return back()
            ->withInput()
            ->withErrors(['email' => 'Estas credenciales no son validas']);
    }
}
