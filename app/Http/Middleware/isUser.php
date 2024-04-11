<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;

class isUser
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
        if (Auth::check() && Auth::user()->role->level == 1) {
            // If user is admin, just proceed to the next middleware or route
            return $next($request);
        }

        $courseId = $request->route('id');

        // Check if the authenticated user is enrolled in the course with the given ID
        if (Auth::check() && Auth::user()->course->id == $courseId ) {
            // If the user is enrolled in the course, proceed to the next middleware or route
            return $next($request);
        }
        // If neither condition is met, return unauthorized or redirect as needed
        return abort(403, 'Unauthorized');
    }
}
