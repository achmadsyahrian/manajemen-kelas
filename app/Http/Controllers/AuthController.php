<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        return back()->with('error', 'Sign In Failed!');
    }
    
    public function signout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/sign-in')->with('success', 'Log Out successful!');
    }
    
    public function signup() {
        return view('auth.sign-up');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:5|unique:users|starts_with:@',
            'email' => 'required|email:dns|unique:users',
            'phone' => 'nullable|regex:/^[0-9]{11,}$/|unique:users', //nullable artinya tidak required, regex : 0-9
            'password' => 'required|min:5|max:255',
        ]);
        // Enkripsi
        $validated['password'] = Hash::make($validated['password']);
        // Role
        $validated['role'] = "user";
        User::create($validated);

        return redirect('/sign-in')->with('success', 'Registration Successfull!');
    }
    
}
