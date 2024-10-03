<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Jika user memiliki role 'user', izinkan akses
        if (auth()->check() && auth()->user()->role === 'user') {
            return $next($request);
        }

        // Jika bukan user, arahkan kembali ke halaman login atau halaman lain
        return redirect('/login')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
