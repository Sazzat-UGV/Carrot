<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Check if the authenticated user is an admin
        if ($user && $user->role === 'Admin') {
            return $next($request);
        }

        // Redirect to the admin login page if not authorized
        return redirect()->route('admin.login.page')->with('error', 'You are not authorized to access this page.');

    }
}
