<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class VerifyLicense
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     * @throws ConnectionException
     */
    public function handle(Request $request, Closure $next): Response
    {
        $license = json_decode(Storage::get($licensePath), true);

        $response = Http::post(config('app.url'), $license);

        if ($response->successful() && $response->json('valid')) {
            Log::error('License is invalid.');
        }

        return $next($request);

    }
}
