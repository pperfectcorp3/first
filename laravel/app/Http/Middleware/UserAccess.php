<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  mixed  $type
     * @return Illuminate\Http\Response|Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next, $type): Response
    {
        $user_type = $request->user()->type;

        return in_array($user_type, explode(':', $type)) || $user_type == 'super'

            ? $next($request)

            : response()->json(['You do not have permission to access for this page.'])

        ;

    }

}
