<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTokenAbilities
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        foreach ($abilities as $ability) {
            // Check if the user's token has the required ability
            if (!$request->user()->tokenCan($ability)) {
                abort(403, 'Unauthorized'); // Return 403 Forbidden if the ability is not present
            }
        }
        return $next($request);
    }
}
