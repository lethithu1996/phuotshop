<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckLevel
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
       if(Auth::check()&&Auth::users()->status > 0)
        {
            return $next($request);
        }else{
            return redirect('/');
        }

    }
}
