<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IzinSktm
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
        $user = Auth::user();
        if ($user->status_lengkap == 1) {
            return redirect('sktm');
        } else if ($user->status_lengkap == 0) {
            return redirect('lengkapi-dulu');
        }
        return $next($request);
    }
}
