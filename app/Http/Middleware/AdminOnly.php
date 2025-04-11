<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->role->name !== 'Administrador') {
            abort(403, 'Acceso denegado');
        }

        return $next($request);
    }
}
