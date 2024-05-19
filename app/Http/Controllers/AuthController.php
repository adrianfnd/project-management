<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function redirect()
    {
        return redirect('/dashboard_project');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard_project');
        }

        return back()->withErrors(['email' => 'Password atau Email yang anda masukkan salah']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}