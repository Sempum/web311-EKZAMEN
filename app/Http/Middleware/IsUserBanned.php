<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class IsUserBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->banned_till != null) {

            if (auth()->user()->banned_till == 0) {
                $message = 'Your account has been banned permanently.';
            }

            auth()->logout();
            return redirect()->route('auth.loginIndex')->with('message', $message);
        }

        return $next($request);
    }
}

