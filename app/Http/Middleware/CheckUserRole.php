<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!auth()->user() || auth()->user()->role != $role) {
            // if($request->user()->role != $role)
            //     return redirect('/'.auth()->user()->role);
           abort(403);
        }
    
        return $next($request);
    }
}
