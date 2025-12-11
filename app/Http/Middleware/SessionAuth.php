<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SessionAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('USER_ID')) {
            return redirect()->route('login')->with('error', 'Please log in');
        }

        return $next($request);
    }
}

