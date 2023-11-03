<?php

namespace App\Http\Controllers;

use App\Models\Student;
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
        $user = User::where('username', $validated['username'])->first();
        if ($user && $user->status === "active" && Auth::attempt($validated)) {
            $namaLengkap = explode(' ', $user->name);
            $firstName = $namaLengkap[0]; // Kata pertama
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success','Selamat Datang '.$firstName);
        }
        return back()->with('error', 'Login Gagal!');
    }
    
    public function signout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/sign-in')->with('success', 'Anda Berhasil Logout!');
    }
    
    public function signup() {
        return view('auth.sign-up');
    }

    public function store(Request $request) {
        // User
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:5|unique:users|starts_with:@',
            'password' => 'required|min:5|max:255',
            'email' => 'nullable|email:dns|unique:users'
        ]);
        
        // Enkripsi
        $validated['password'] = Hash::make($validated['password']);
        // Status
        $validated['status'] = "waiting";
        $validated['role'] = "user";
        User::create($validated);

        return redirect('/sign-in')->with('regisSuccess', 'Akan segera dikonfirmasi oleh Admin');
    }
    
}
