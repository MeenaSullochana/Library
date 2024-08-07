<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PublisherMiddleware
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

       if (auth('publisher')->check() && auth('publisher')->user()) {
            return $next($request);
        }

        return redirect()->route('user.login-view');
    }
}
