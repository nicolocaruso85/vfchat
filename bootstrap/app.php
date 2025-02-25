<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
  ->withRouting(
    web: __DIR__.'/../routes/web.php',
    commands: __DIR__.'/../routes/console.php',
    health: '/up',
  )
  ->withMiddleware(function (Middleware $middleware) {
    $middleware->validateCsrfTokens(except: [
      'check-permission/*/*/*',
    ]);
  })
  ->withExceptions(function (Exceptions $exceptions) {
    //
  })->create();

$app->singleton(
  Illuminate\Contracts\Console\Kernel::class,
  App\Console\Kernel::class
);

return $app;
