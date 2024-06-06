<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

/**
 *
 */
class SecurityHeader extends Middleware
{

    public function handle($request, Closure $next, ...$guards)
    {
        $response = $next($request);
        $csp = "img-src 'self' blob: data:;";
        // $csp = "default-src https: data: 'unsafe-inline' 'unsafe-eval'; img-src 'self' blob: data:;";
        $response->headers->set('Content-Security-Policy', $csp);
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('Referrer-Policy', 'same-origin');
        $response->headers->set('Permissions-Policy', 'fullscreen=()');
        $response->headers->set('Strict-Transport-Security', 'max-age=63072000; includeSubDomains; preload');
        return $response;
    }
}
