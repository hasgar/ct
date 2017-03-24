<?php
    namespace App\Http\Middleware;
    use Closure;

    use Auth;
    class isAdmin
    {

        public function handle($request, Closure $next)
        {
          if (Auth::check()) {

            if (Auth::user()->id == '96'){
                return $next($request);
            }
            
        }
            return redirect('/');
        }

    }
