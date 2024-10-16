<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckMultipleRoles
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Get all roles assigned to the user
            $roles = $user->getRoleNames(); // This will return a collection of role names

            // Check if the user has two or more roles
            if ($roles->count() >= 2) {
                return redirect()->route('user-role-show'); // Redirect to user-role-show if the user has two or more roles
            }

            // Redirect to the page-not-found route if the user has less than two roles
            return redirect()->route('page-not-found'); // Redirect for fewer than two roles
        }

        // If the user is not authenticated, abort with a 401 error
        abort(401);
    }
}




// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class CheckMultipleRoles
// {
//     public function handle(Request $request, Closure $next)
//     {
//         $user = Auth::user();

//         if ($user && $user->hasRole('Admin')) {
//             return $next($request);
//         }

//         // Redirect to /add-user if the user has only the 'employee' role or no roles
//         if ($user && $user->hasRole('employe')) {
//             return redirect('/add-user')->with('error', 'Access denied! Employees cannot access this page.');
//         }

//         // Handle the case where the user is not authenticated or has no roles
//         return redirect('/add-user')->with('error', 'Access denied! You do not have permission to access this page.');
//     }
// }

