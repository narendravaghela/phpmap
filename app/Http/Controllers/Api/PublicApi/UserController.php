<?php

namespace App\Http\Controllers\Api\PublicApi;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }

    public function getLatest()
    {
        $users = User::all()->take(4);

        return response()->json($users);
    }

    public function show($id)
    {
        //
    }
}
