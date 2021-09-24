<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role1='', $role2='')
    {
        $role = Auth::User()->level;

        if($role1 == $role || $role2 == $role)
        {
            return $next($request);
        } else {
            return abort("403");
        }
    }
}
