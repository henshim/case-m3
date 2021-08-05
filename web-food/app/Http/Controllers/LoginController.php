<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function goToLogin()
    {
        return view('login.login');
    }

    public function goToRegister()
    {
        return view('login.register');
    }

    public function loginAdmin()
    {

    }
}
