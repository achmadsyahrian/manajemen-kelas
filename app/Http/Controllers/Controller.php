<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getUserProfilePhoto($user)
    {
        if ($user->role == 'mahasiswa' && !empty($user->student->photo)) {
            return 'storage/' . $user->student->photo;
        } elseif ($user->role == 'administrator') {
            return 'images/user/administrator.jpg';
        } else {
            return 'images/user/default-user-2.png';
        }
    }

    
}
