<?php

namespace Crater\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MasterAdminAuth
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
        if (!session()->has('master_logged_in')) {
            return redirect()->route('master.login')->with('error', 'Please login to access the master panel.');
        }

        return $next($request);
    }
}
