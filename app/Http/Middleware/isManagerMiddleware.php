<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isManagerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role !== 'admin' and auth()->user()->role !== 'manager') {
            abort(403, 'شما دسترسی لازم برای ورود به این صفحه را ندارید!');
        }
        return $next($request);
    }
}
