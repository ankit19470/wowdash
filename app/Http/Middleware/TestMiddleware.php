<?php

namespace App\Http\Middleware;

use Closure;

class TestMiddleware
{
    public function handle($request, Closure $next)
    {
        return $next($request); // Just pass the request for testing
    }
}
