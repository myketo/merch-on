<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Validation\UnauthorizedException;

class AppAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$this->isAuthorized($request)) {
            throw new UnauthorizedException('Unauthorized.', 401);
        }

        return $next($request);
    }

    public function isAuthorized($request)
    {
        if (!$request->hasHeader('Authorization')) {
            return false;
        }

        $token = explode(' ', $request->header('Authorization'))[1];

        return $token === env('APP_FRONTEND_API_KEY');
    }
}
