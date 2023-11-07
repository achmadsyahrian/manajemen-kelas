<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $userProfilePhoto;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->userProfilePhoto = $this->getUserProfilePhoto(Auth::user());
            return $next($request);
        });
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.profile.profile', [
            'user' => $user,
            'userProfilePhoto' => $this->userProfilePhoto
        ]);
    }

    public function update(User $user, Request $request, UserController $userController) //cara memakai fungsi controller lain
    {
        $userController->validateUserData($request, $user);
        $userController->validateStudentData($request, $user);

        return redirect('/')->with('success', 'Data Berhasil Disimpan!');
    }

}
