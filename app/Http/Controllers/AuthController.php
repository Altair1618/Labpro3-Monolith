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
        $credentials = $this->getCredentials($identifier);

        if (!$token = auth()->attempt($credentials)) {
            return redirect()->back()->withErrors(['message' => 'Login failed.']);
        }
        
        return redirect()->intended('/catalog')->withCookie(cookie('token', $token, 3600));
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->intended('/login')->withCookie(cookie()->forget('token'));
    }

    private function getCredentials($identifier)
    {
        $loginType = filter_var($identifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($loginType == 'email') {
            return ['email' => $identifier, 'password' => request('password')];
        } else {
            return ['username' => $identifier, 'password' => request('password')];
        }
    }
}