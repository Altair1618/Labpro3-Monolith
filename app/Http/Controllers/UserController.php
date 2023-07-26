<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function register(StoreUserRequest $request) {
        $user = User::create($request->validated());
        $token = auth()->login($user);
        
        return redirect()->intended('/catalog')->withCookie(cookie('token', $token, 3600));
    }
}
