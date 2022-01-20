<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CanEditProfile
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
        if( (auth()->user()->id == $request->route('userId')) || auth()->user()->role == 2) {
            return $next($request);
        } else {
            return redirect()->route('home')->with('error', 'Radnja nije dozvoljena! Kontaktirajte administratora.');
        }
    }
}
