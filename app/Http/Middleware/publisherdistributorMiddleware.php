<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class publisherdistributorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

       if (auth('publisher_distributor')->check() && auth('publisher_distributor')->user()) {
            return $next($request);
        }

        return redirect()->route('user.login-view');
    }
}
