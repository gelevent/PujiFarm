<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ], [
            'email.exists' => 'Email tidak terdaftar sebagai admin.',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}