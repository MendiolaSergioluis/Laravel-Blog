<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBeAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Lógica agregada al middleware
        if (auth()->user()?->email !== 'mendiolasergioluis@gmail.com'){
            abort(Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
