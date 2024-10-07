<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('sign-in'); // Redirect to login if not authenticated
        }

        // Check if the user has the required role
        if (!Auth::user()->hasRole($role)) {
            return redirect()->route('user-page'); // Redirect if the user does not have the role
        }

        return $next($request); // Proceed to the next request if authenticated and has the role
    }
}

