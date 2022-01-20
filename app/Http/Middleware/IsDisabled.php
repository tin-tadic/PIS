<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsDisabled
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

        if(auth()->user()->disabled == 0) {
            return $next($request);
        } else {
            Auth::logout();
            return redirect()->back()->with('error', 'Vaš račun je trenutno onesposobljen! Kontaktirajte administratora!');
        }

    }
}
