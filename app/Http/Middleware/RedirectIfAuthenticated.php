<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard === 'admin' && Auth::guard($guard)->check()) {
            return redirect('/admin');
        }
        if ($guard === 'marketing' && Auth::guard($guard)->check()) {
            return redirect('/marketing');
        }
        if ($guard === 'support' && Auth::guard($guard)->check()) {
            return redirect('/support');
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }
}
