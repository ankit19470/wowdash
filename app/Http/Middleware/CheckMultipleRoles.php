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

        if ($user && $user->roles->count() <= 1) {
            return redirect('/add-user');
        }

        return $next($request);
    }
}


