<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Student
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and has an 'student' role
        if (Auth::check() && Auth::user()->role === 'student') {
            return $next($request);
        }

        // Redirect to home or show a 403 error if the user is not an student
        return redirect('/')->with('error', 'Unauthorized access.');
    }
}
