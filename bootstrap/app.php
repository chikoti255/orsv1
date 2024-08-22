<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\GenerateSafeSubmitToken;
use App\Http\Middleware\Admin;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        /*$middleware->alias([
          'multiple_submissions' => GenerateSafeSubmitToken::class
        ]);*/
      //  $middleware->append(GenerateSafeSubmitToken::class);
      $middleware->alias([
        'admin' => Admin::class
    ]);

    $middleware->validateCsrfTokens(except: [ //to not verify csrf token on scanning
        'http://127.0.0.1:8000/handleScanned',
        'http://127.0.0.1:8000/attendee/*',
        'http://127.0.0.1:8000//attendee/analytics/get-countries',
    ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
