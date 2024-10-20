<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthChecker
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session()->has('loginId')) {
            return redirect('/')->with('fail', 'You\'re not logged in yet! You have to login!');
        }
        return $next($request);
    }
}
