<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login()
    {
        $identifier = request('identifier');
        $loginType = filter_var($identifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($loginType == 'email') {
            $credentials = ['email' => $identifier, 'password' => request('password')];
        } else {
            $credentials = ['username' => $identifier, 'password' => request('password')];
        }

        if (!$token = auth()->attempt($credentials)) {
            return redirect()->back()->withErrors(['message' => 'Login failed.']);
        }
        
        return redirect()->intended('/catalog')->withCookie(cookie('token', $token, 3600));
    }
    
    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->intended('/login')->withCookie(cookie()->forget('token'));
    }
}