<?php
    namespace App\Http\Middleware;
    use Closure;
    class checkAdmin{
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  \Closure                 $next
         * @return mixed
         */
        public function handle($request, Closure $next){
            if($request->user() === null || !$request->user()->is_admin){
                return redirect()->route('liste_tshirt');
            }
            return $next($request);
        }
    }
