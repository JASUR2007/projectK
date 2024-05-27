<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()) {
            if(Auth::user()->role == '0') {
                return $next($request);
            }
        }
        return redirect('/api');
    }
}