<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated and has a specific role
        if (!Auth::check() || !Auth::user()->hasRole('admin')) { // Adjust role as needed
            return redirect('/'); // Redirect to home or login if not authorized
        }

        return $next($request);
    }
}
