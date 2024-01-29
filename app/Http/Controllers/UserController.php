<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        //
    }


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
        return view('user.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:5|starts_with:@|unique:users',
            'email' => 'nullable|email:dns|unique:users',
        ]);
        // password
        $validated['password'] = Hash::make('12345678');
        // Role
        $validated['role'] = 'user';
        // Status
        $validated['status'] = 'active';
        User::create($validated);
        return redirect('/user')->with('success', 'User Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.view', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.form', [
            'user' => $user,
            'title' => 'EDIT USER',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user, UserRequest $request)
    {
        $user = User::find($user->id);
        $validatedData = $request->validated();
        if (empty($validatedData['password'])) {
            unset($validatedData['password']);
        } else {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect('/user')->with('success', 'User Berhasil Disimpan!');
    }


    public function updateProfile(User $user, Request $request)
    {
        $this->validateUserData($request, $user);
        $this->validateStudentData($request, $user);

        return redirect('/')->with('success', 'Data Berhasil Disimpan!');
    }

    public function validateUserData($request, $user)
    {
        $validatedUser = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:5|starts_with:@|unique:users,username,' . $user->id,
            'email' => 'nullable|email:dns|unique:users,email,' . $user->id,
        ]);

        $user->update($validatedUser);
    }

    public function validateStudentData($request, $student)
    {
        if ($student) {
            $validatedStudent = $request->validate([
                'nim' => 'required|size:10|regex:/^[0-9]{10}$/|unique:students,nim,' . $student->id,
                'gender' => 'required',
                'phone' => 'nullable|regex:/^[0-9]{11,}$/|unique:students,nim,' . $student->id,
                'photo' => 'image|file|max:5000', //5mb max
            ]);
            if ($request->hasFile('photo')) {
                $newPhotoPath = $request->file('photo')->store('student-images', 'public');
                if ($request->oldPhoto) {
                    Storage::disk('public')->delete($request->oldPhoto);
                }
                $validatedStudent['photo'] = $newPhotoPath;
            }
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
