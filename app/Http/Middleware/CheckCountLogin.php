<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckCountLogin
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->count > 0) {
            return $next($request);
        } else {
            return redirect(route('user.change-password'));
        }
    }
}
