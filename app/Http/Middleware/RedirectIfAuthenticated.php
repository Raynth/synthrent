<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'admin':
                // Als de administrator is ingelogd, dan wordt via admin-login direct doorverwezen naar admin/home
                if (Auth::guard($guard)->check()) {
                    return redirect('admin/home');
                }
                break;
            default:
                // Als de klant is ingelogd, dan wordt via login direct doorverwezen naar /
                if (Auth::guard($guard)->check()) {
                    return redirect('/');
                }
        }

        return $next($request);
    }
}
