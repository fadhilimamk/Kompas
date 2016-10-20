<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //handle auth
    public function authenticate()
    {
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended('/');
        }
    }

}
