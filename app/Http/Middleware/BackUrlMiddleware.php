<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BackUrlMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Setelah response, simpan URL hanya untuk GET biasa
        if ($request->method() === 'GET' && !$request->ajax()) {
            $request->session()->put('_previous.url', $request->fullUrl());
        }

        return $response;
    }
}
