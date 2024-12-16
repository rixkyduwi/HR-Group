<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class AuthController extends Controller
{
    function index()
    {
        return view('auth.login');
    }
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Harap Masukan Email',
            'password.required' => 'Harap Masukan password'
        ]);
        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            // Arahkan berdasarkan role
            $role = Auth::user()->role;

            switch ($role) {
                case 'direktur':
                    return redirect('/direktur');
                case 'admin':
                    return redirect('/admin');
                case 'gm':
                    return redirect('/general-manager');
                case 'mh':
                    return redirect('/manager-hrd');
                case 'mm':
                    return redirect('/manager-marketing');
                case 'ml':
                    return redirect('/manager-legal');
                case 'mp':
                    return redirect('/manager-produksi');
                case 'mk':
                    return redirect('/manager-keuangan');
                case 'hrd':
                    return redirect('/hrd');
                case 'marketing':
                    return redirect('/marketing');
                case 'legal':
                    return redirect('/legal');
                case 'produksi':
                    return redirect('/produksi');
                case 'Keuangan':
                    return redirect('/Keuangan');
                default:
                    return redirect('/home');
            }
        }
        return redirect('')->withErrors('Email dan Password yang dimasukan tidak sesuai');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
