<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OnlyAdmins
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
  //  public function handle(Request $request, Closure $next)
  //  {
    //    return $next($request);
   // }
//}

public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        abort(403, 'Access denied');
    }
}
