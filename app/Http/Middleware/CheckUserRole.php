<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Check if the session has 'current_page' set to 'user-page'
        if ($user && $request->session()->get('current_page') === 'user-page') {
            // Redirect the user to 'user-page' if they try to access anything else
            if ($request->path() !== 'user-page') {
                return redirect('user-page')->with('error', 'You are restricted to the user-page.');
            }
        }

        return $next($request);
    }
}
