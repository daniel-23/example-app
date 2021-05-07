<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
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
        if(session()->has('locale')) {
            app()->setLocale(session('locale'));
        }else{
            $lan = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0,2);
            app()->setLocale($lan);
        }
        return $next($request);
    }
}
