<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InactivityTimeout
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
        $timeout = config('session.lifetime') * 60; // Convert minutes to seconds
        if (Session::has('last_activity') && (time() - Session::get('last_activity') > $timeout)) {
            Session::flush(); // Clear all session data
            return redirect('/login')->with('message', 'Session expired due to inactivity.');
        }
        Session::put('last_activity', time());
        return $next($request);
    }
}
