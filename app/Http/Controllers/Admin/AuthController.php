<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function show() 
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        $user = $request->validate([
            'username' => ['required', 'min:3', 'max:25'], //admin 
            'password' => ['required', 'min:8', 'max:125'], //12345678
        ]);

        if (Auth::attempt($user)) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'username' => 'Beyle ulanyjy yok',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
