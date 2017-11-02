<?php

namespace App\Http\Middleware;

use Closure;

class checkAdmin
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
       // dd($request->user());
        if(null === $request->user() || !$request->user()->is_admin) {
            return redirect()->route('homepage');
        }
        return $next($request);
    }
}
