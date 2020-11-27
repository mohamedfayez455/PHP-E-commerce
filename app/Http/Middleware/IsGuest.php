<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class IsGuest
{
    public function handle($request, Closure $next , $guard = null)
    {
        if (! Auth::guard($guard)->check()){

            return $next($request);
        }
            return redirect()->route('home');
    }


}
