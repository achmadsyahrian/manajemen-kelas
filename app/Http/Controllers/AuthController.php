<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\Student;
use App\Models\User;
use App\Providers\RouteServiceProvider;
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
            return redirect(RouteServiceProvider::HOME)->with('success','Selamat Datang '.$firstName);
        }
        return back()->with('error', 'Akun Tidak Terdaftar!');
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

    public function store(RegistrationRequest $request) {
        // validasi
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $data['status'] = "waiting";
        $data['role'] = "user";

        User::create($data);
        return redirect('/sign-in')->with('regisSuccess', 'Akan segera dikonfirmasi oleh Admin');
    }
    
}
