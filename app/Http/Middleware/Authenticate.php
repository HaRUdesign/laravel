<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    protected $user_route  = 'user.login';
    protected $host_route = 'host.login';

    protected function redirectTo($request)
    {
        // ルーティングに応じて未ログイン時のリダイレクト先を振り分ける
        if (!$request->expectsJson()) {
         if (Route::is('user.*')) {
                return route($this->user_route);
            } elseif (Route::is('host.*')) {
                return route($this->host_route);
            }

            // if (Route::is('user.*')) {
            //     return route($this->user_route);
            // } elseif (Route::is('host.*')) {
            //     return route($this->host_route);
            // }
        }
    }
}
