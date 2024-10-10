<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckMultipleRoles
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->hasRole('Admin')) {
            return $next($request);
        }

        // Redirect to /add-user if the user has only the 'employee' role or no roles
        if ($user && $user->hasRole('employe')) {
            return redirect('/add-user')->with('error', 'Access denied! Employees cannot access this page.');
        }

        // Handle the case where the user is not authenticated or has no roles
        return redirect('/add-user')->with('error', 'Access denied! You do not have permission to access this page.');
    }
}

