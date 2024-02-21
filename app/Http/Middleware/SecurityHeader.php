<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class SecurityHeader extends Middleware
{
    public function handle($request,$next)
    {
        $response = $next($request);
        $response->headers->set('Content-Security-Policy', "block-all-mixed-content; script-src 'self' http://code.jquery.com/ https://fonts.googleapis.com/ https://fonts.gstatic.com https://cdn.datatables.net/ https://cdn.jsdelivr.net/; object-src 'self';");
        $response->headers->set('X-Frame-Options','SAMEORIGIN');
        $response->headers->set('X-Content-Type-Options','nosniff');
        $response->headers->set('Referrer-Policy','same-origin');
        $response->headers->set('Permissions-Policy','fullscreen=()');
        $response->headers->set('Strict-Transport-Security','max-age=63072000; includeSubDomains; preload');
        return $response;
    }
}
