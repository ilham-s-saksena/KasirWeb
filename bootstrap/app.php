<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        using: function () {
            Route::middleware('api')
                ->prefix('v1')
                ->group(glob(base_path('routes/api/v1/*.php'))
            );

            Route::middleware('api')
                ->prefix('v1.1')
                ->group(glob(base_path('routes/api/v1.1/*.php'))
            );
    
            Route::middleware('web')
                ->group(glob(base_path('routes/web/*.php')));
        },
        // web: __DIR__.'/../routes/web.php',
        // api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
