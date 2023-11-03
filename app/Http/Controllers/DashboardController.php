<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke() 
    {
        $userProfilePhoto = $this->getUserProfilePhoto(Auth::user());
        return view('index', compact('userProfilePhoto'));
    }
}
