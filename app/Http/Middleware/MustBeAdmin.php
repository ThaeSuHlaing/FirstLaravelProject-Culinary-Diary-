<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBeAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if(auth()->guest() || !auth()->user()->is_admin)
        {
            abort(403);
        }
        return $next($request);
    }
}
