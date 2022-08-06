<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (!empty($guards) && !in_array(Auth::user()->user_type, $guards)) {
            return abort(503, __('errors.dont_have_access_rights'));
        }

        return $next($request);
    }
}
