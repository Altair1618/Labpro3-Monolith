<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class Validator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $token = $request->cookie('token')) {
            return redirect()->intended('/login')->withErrors(['message' => 'You must login first.']);
        }

        try {
            JWTAuth::setToken($token)->getPayload();
            $user = JWTAuth::authenticate();
        } catch (\Throwable $th) {
            return redirect()->intended('/login')->withErrors(['message' => 'You must login first.']);
        }

        $request->merge(['user' => $user]);
        return $next($request);
    }
}
