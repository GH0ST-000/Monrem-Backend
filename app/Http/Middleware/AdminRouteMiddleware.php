<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class AdminRouteMiddleware
{
    private const ADMIN_EMAIL = 'admin@gmail.com';

    public function handle(Request $request, Closure $next): Response
    {
        $providedCredentials = $request->only('email', 'password');
        $providedEmail = $providedCredentials['email'];

        if ($providedEmail !== self::ADMIN_EMAIL) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
