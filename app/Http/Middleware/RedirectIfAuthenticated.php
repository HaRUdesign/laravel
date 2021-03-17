<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;


class RedirectIfAuthenticated
{

    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::guard($guard)->check()){
            if($guard === 'user'){
                return redirect(RouteServiceProvider::HOME);
        }elseif($guard === 'host'){
                return redirect(RouteServiceProvider::HOST_HOME);
        }
            }

        // if (Auth::guard($guard)->check() && $guard === 'user') {
        //     return redirect()->route('user.dashboard');
        //     // return redirect(RouteServiceProvider::HOME);
        // } elseif (Auth::guard($guard)->check() && $guard === 'host') {
        //     return redirect()->route('host.dashboard');
        //     // return redirect(RouteServiceProvider::HOST_HOME);
        // }

        return $next($request);
    }

    // public function handle($request, Closure $next, $guard = null)
    // {
    //     if (Auth::guard($guard)->check()) {
    //         return redirect()->route('user.home');; // ここを変更する
    //     }
    // }

}
