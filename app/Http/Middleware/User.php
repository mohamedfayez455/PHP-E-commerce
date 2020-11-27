<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class User
{

    public function handle($request, Closure $next = null , $guard = null)
    {
        if (Auth::guard('user')->check())
        {
            return $next($request);
        }
        else
        {
            return redirect('/front/login');
        }
    }


}
