<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DistributorMiddleware
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

       if (auth('distributor')->check() && auth('distributor')->user()) {
            return $next($request);
        }

        return redirect()->route('user.login-view');
    }
}
