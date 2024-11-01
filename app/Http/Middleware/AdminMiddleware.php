<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
         // Check if the user is authenticated as an admin
         if (!Auth::guard('admin')->check()) {
            // User is authenticated as an admin
            return redirect()->route('admin.login'); // Allow the request to proceed
        }
        return $next($request);
        // If the user is not authenticated as admin, redirect to login page
     
     
    }
}
