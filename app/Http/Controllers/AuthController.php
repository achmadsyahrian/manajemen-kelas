<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signin() {
        return view('auth.sign-in');
    }

    public function authenticate(Request $request) {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with('login-failed', 'Login Failed!');
    }
    
    public function signout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/sign-in')->with('sign-out-success', 'Log Out successful');
    }
    
    public function signup() {
        return view('auth.sign-up');
    }
}
