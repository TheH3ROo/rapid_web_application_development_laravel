<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class auth2
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()){
            if ($request->user()->role==2 && $request->route()->named('admin'))
                return redirect('user');
            else return $next($request);
        }
        else return redirect('login');
    }
}
