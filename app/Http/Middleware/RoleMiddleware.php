<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Get user role from session
        $userRole = $request->session()->get('ROLE_ID');

        // Convert all roles to integers for comparison
        $roles = array_map('intval', $roles);

        if (!$userRole || !in_array($userRole, $roles)) {
            // Log out user and redirect to login if role is unauthorized
            $request->session()->flush(); 
            return redirect()->route('login')->with('error', 'Unauthorized access');
        }

        return $next($request);
    }
}
