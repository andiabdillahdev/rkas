<?php

namespace App\Http\Middleware;
use App\Providers\RouteServiceProvider;
// use Closure;
use Illuminate\Support\Facades\Auth;

use Closure;

class roleUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        switch ($guard) {
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('home');
                }
                break;
            case 'agent':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('agent.home');
                }
                break;
        }
        return $next($request);
    }
}
