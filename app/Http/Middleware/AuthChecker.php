<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthChecker
{
    public function handle(Request $request, Closure $next)
    {
        // if (!Auth::check()) {
        //     return redirect('/')->with('fail', 'You need to log in first!');
        // }
        if (!Session()->has('loginId')) {
            dd(Session::get('loginId'));
            return redirect('/')->with('fail', 'You\'re not logged in yet! You have to login!');
        }
        return $next($request);
    }
}
