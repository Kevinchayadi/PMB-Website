<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }

        // Periksa guard aktif berdasarkan middleware yang digunakan
        $routeMiddleware = $request->route()->middleware();

        if (in_array('auth:admin', $routeMiddleware)) {
            return route('admin.login');
        }

        if (in_array('auth:web', $routeMiddleware)) {
            return route('home');
        }

        // Default fallback jika tidak ada guard yang cocok
        return route('home');
    }
}
