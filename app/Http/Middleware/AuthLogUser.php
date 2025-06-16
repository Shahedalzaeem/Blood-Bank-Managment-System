<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AuthLogUser
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('log_user_id')) {
            return redirect('/login');
        }

        return $next($request);
    }
}