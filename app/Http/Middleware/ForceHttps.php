<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceHttps
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah HTTPS tidak digunakan
        if (!$request->isSecure() && config('app.env') !== 'local') {
            // Redirect ke HTTPS
            return redirect()->secure($request->getRequestUri(), 301);
        }

        return $next($request);
    }
}
