<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user is an admin
        if ($request->user() && $request->user()->isAdmin()) {
            return $next($request);
        }

        // Redirect to the homepage or display an error message
        return redirect()->route('home')->with('error', 'Unauthorized access.');
    }
}
