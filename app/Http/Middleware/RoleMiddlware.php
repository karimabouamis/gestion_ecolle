<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next, ...$roles)
    public function handle(Request $request, Closure $next)
    {

        // if (!Auth::check()) {
        //     return redirect()->route('auth.login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        // }

       
        // if (!in_array(Auth::user()->role, $roles)) {
        //     return redirect()->back()->with('error', 'Vous n\'avez pas accès à cette ressource.');
        // }

        return $next($request);
    }
}
