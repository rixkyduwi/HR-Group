<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Periksa apakah user sudah login dan memiliki role yang sesuai
        if (Auth::check() && Auth::user()->role == $role) {
            return $next($request);
        }

        switch (Auth::user()->role) {
            case 'admin':
                return redirect('/admin');
            case 'direktur':
                return redirect('/direktur');
            case 'gm':
                return redirect('/general-manager');
            case 'mh':
                return redirect('/manager-hrd');
            case 'mk':
                return redirect('/manager-keuangan');
            case 'mm':
                return redirect('/manager-marketing');
            case 'ml':
                return redirect('/manager-legal');
            case 'mp':
                return redirect('/manager-keuangan');
            default:
                return redirect('/home'); // Halaman default jika role tidak sesuai
        }
    }
}
