<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\RecordNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Laravel\Sanctum\Http\Middleware\CheckAbilities;
use Laravel\Sanctum\Http\Middleware\CheckForAnyAbility;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'abilities' => CheckAbilities::class,
            'ability' => CheckForAnyAbility::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {

        $exceptions->render(function (AccessDeniedHttpException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ],  response::HTTP_FORBIDDEN);
        });

        $exceptions->render(function (NotFoundHttpException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ],  response::HTTP_NOT_FOUND);
        });

        $exceptions->render(function (RouteNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ],  response::HTTP_FORBIDDEN);
        });

        $exceptions->render(function (RecordNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ],  response::HTTP_NOT_FOUND);

        });

        $exceptions->render(function (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ],  response::HTTP_INTERNAL_SERVER_ERROR);
        });

        $exceptions->render(function (MethodNotAllowedHttpException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ],  response::HTTP_INTERNAL_SERVER_ERROR);
        });
    })->create();
