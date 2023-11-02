<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logUser = Auth::user();
        $users = User::where('id', '!=', $logUser->id)->orderBy('name')->paginate(10);
        $usersActive = User::where('status', 'active');
        $usersWaiting = User::where('status', 'waiting');
        return view('user.index', [
            'users' => $users,
            'usersActive' => $usersActive,
            'usersWaiting' => $usersWaiting,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user, Request $request)
    {
        $this->validateUserData($request, $user);
        $this->validateStudentData($request, $user);

        return redirect('/user')->with('success', 'User Berhasil Disimpan!');
    }

    private function validateUserData($request, $user)
    {
        $validatedUser = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:5|starts_with:@|unique:users,username,' . $user->id,
            'email' => 'nullable|email:dns|unique:users,email,' . $user->id,
        ]);

        $user->update($validatedUser);
    }

    private function validateStudentData($request, $user)
    {
        $student = $user->student;

        if ($student) {
            $validatedStudent = $request->validate([
                'nim' => 'required|size:10|regex:/^[0-9]{10}$/|unique:students,nim,' . $student->id,
            ]);

            $student->update($validatedStudent);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->destroy($user->id);  
        return redirect('/user')->with('success', 'User Berhasil Dihapus!');
    }

    // User Activation
    public function activated(User $user)
    {
        $user->update(['status' => 'active']);  
        return redirect('/user')->with('success', 'User Berhasil Diaktivasi!');
    }

    public function disable(User $user) 
    {
        $user->update(['status' => 'disabled']);  
        return redirect('/user')->with('success', 'User Berhasil Dinonaktifkan!');
    }
    
}
