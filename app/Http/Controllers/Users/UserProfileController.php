<?php

namespace App\Http\Controllers\Users;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    public function showProfile($username)
    {
        $user = User::where('username', $username)->first();

        return $user;
    }
}
