<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('userId')) {
            return redirect()->route('login');
        }

        // Otentikasi manual user
        Auth::loginUsingId(session('userId'));

        return $next($request);
    }
}