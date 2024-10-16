<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // Check if the authenticated user has the 'Admin' role
            if (session('user_role') === 'Admin') {
                return $next($request); // Proceed to the next request
            } else {
                // dd("unauthorized role");
                return redirect()->route('page-not-found')->with('error', 'Access denied. Admins only.');
            }
        }

        // Redirect to login if the user is not authenticated
        return redirect()->route('sign-in')->with('error', 'Please log in first.');
    }

}


