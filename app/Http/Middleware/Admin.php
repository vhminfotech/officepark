<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                
                if (Auth::guard('agent')->check()) {
                    
                }else{
                    //print_r(Auth::guard('agent')->user());
                    return redirect()->route('login');
                }
               // return redirect()->route('login');
            }
        }

        return $next($request);
    }
}
