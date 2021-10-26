<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VerifikasiUser
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->status_verifikasi != 1) {
            /* 
            silahkan modifikasi pada bagian ini
            apa yang ingin kamu lakukan jika rolenya tidak sesuai
            */
            return redirect('/')->with('status', 'Akun anda belum terverifikasi oleh pihak Desa. Mohon hubungi pihak desa.')->with('warna', 'alert-warning');
        }
        return $next($request);
    }
}
