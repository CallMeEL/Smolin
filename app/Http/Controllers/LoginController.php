<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('user.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        //Jika user adalah admin
        if (Auth::attempt($credentials) && Auth::user()->role_id == 1) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        //Jika user adalah user biasa
        if (Auth::attempt($credentials) && Auth::user()->role_id == 2) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        //Jika gagal Login
        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
