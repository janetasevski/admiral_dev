<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // User is not authenticated
            // Check if the request is for the register or login routes
            if ($request->is('register') || $request->is('login')) {
                // Allow access to the register and login routes
                return $next($request);
            } else {
                // Redirect non-authenticated users to the login page for other routes
                return redirect()->route('login');
            }
        }

        // User is authenticated, allow access to the requested route
        return $next($request);
    }
}

