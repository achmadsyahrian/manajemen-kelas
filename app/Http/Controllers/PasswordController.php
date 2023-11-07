<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    protected $userProfilePhoto;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->userProfilePhoto = $this->getUserProfilePhoto(Auth::user());
            return $next($request);
        });
    }
    
    public function edit(User $user)
    {   
        $user = Auth::user();
        return view('user.profile.change-password', [
            'user' => $user,
            'userProfilePhoto' => $this->userProfilePhoto
        ]);
    }
}
