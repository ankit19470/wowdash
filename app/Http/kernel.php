<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // Other middleware...
        'checkRole' => \App\Http\Middleware\CheckUserRole::class,
        'test' => \App\Http\Middleware\TestMiddleware::class,

    ];

}
