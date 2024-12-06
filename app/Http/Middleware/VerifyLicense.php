<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

        $response = Http::withHeaders([
            'X-License-Key' => 'DAYDP-7EYE8-BFO7K-9LLSA-WIEEI',
        ])->post(config('app.url').'/license/verify');

        if ($response->successful()) {
            return $response->json();
        }
        return $next($request);
    }
}
