<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsUser
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (session('user_role') === 'user') {
                return $next($request);
            } else {
                return redirect()->route('page-not-found')->with('error', 'Access denied. Users only.');
            }
        }
        // if (Auth::check()) {
        //     // Check if the authenticated user has the 'Admin' role
        //     if (session('user_role') === 'user') {
        //         return $next($request); // Proceed to the next request
        //     } else {
        //         // dd("unauthorized role");
        //         return redirect()->route('page-not-found')->with('error', 'Access denied. Admins only.');
        //     }
        // }

        // Redirect to login if the user is not authenticated
        return redirect()->route('sign-in')->with('error', 'Please log in first.');
    }
}
