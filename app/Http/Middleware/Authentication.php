<?php

namespace App\Http\Middleware;

use Closure;
use Session;


class Authentication
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
        if(!Session::has('identity')){
            return redirect()->route('login');
        }
        return $next($request);
    }
}
