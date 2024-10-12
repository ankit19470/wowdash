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

            // Check if the user has either 'Admin' or 'employe' role
            if ($user->hasRole(['Admin', 'employe'])) {
                return $next($request); // Proceed if the user has the required roles
            }

            // If user doesn't have required roles, abort with a 403 error
            abort(403);
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

