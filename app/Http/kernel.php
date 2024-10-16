<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{

    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'checkRoles' => \App\Http\Middleware\CheckMultipleRoles::class,
        'isAdmin' => \App\Http\Middleware\IsAdmin::class,
        // 'isEmployee' => \App\Http\Middleware\IsEmployee::class,
        'isUser' => \App\Http\Middleware\IsUser::class,


    ];
}
