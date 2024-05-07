<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if ($guard=='admin' && Auth::guard($guard)->check()) {
                return redirect("/admin/index");
            }
            if ($guard=='subadmin' && Auth::guard($guard)->check()) {
                return redirect("/sub_admin/index");
            }
            if ($guard=='publisher' && Auth::guard($guard)->check()) {
                return redirect("/publisher/index");
            }
            if ($guard=='distributor' && Auth::guard($guard)->check()) {
                return redirect("/distributor/index");
            }
            if ($guard=='publisher_distributor' && Auth::guard($guard)->check()) {
                return redirect("/publisher_distributor/index");
            }
            if ($guard=='librarian' && Auth::guard($guard)->check()) {
                return redirect("/librarian/index");
            }
            if ($guard=='reviewer' && Auth::guard($guard)->check()) {
                return redirect("/reviewer/index");
            }
            if ($guard=='periodical_publisher' && Auth::guard($guard)->check()) {
                return redirect("/periodical_publisher/index");
            }
            if ($guard=='periodical_distributor' && Auth::guard($guard)->check()) {
                return redirect("/periodical_distributor/index");
            }
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
