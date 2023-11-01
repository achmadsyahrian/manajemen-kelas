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
        // User
        $validatedUser = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:5|unique:users|starts_with:@',
            'password' => 'required|min:5|max:255',
            'role' => 'required',
        ]);
        
        // Enkripsi
        $validatedUser['password'] = Hash::make($validatedUser['password']);
        // Status
        $validatedUser['status'] = "waiting";
        $newUser = User::create($validatedUser);

        // Student
        $validatedStudent = $request->validate([
            'nim' => 'required|regex:/^[0-9]{10,}$/', //nullable artinya tidak required, regex : 0-9
        ]);
        $validatedStudent['user_id'] = $newUser->id;
        Student::create($validatedStudent);

        return redirect('/sign-in')->with('success', 'Registration Successfull!');
    }
    
}
