<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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

    public function login(Request $request)
    {
        //dd(123);
        $email = $request->email;
        $password = $request->password;

        $data = [
            'email' => $email,
            'password' => $password,
        ];
//dd($data);
        if (Auth::attempt($data)){
            return redirect()->route('admin.food.list');
        }else{
            session()->flash('login_error','Account not exists');
            return redirect()->route('login.goToLogin');
        }
    }

    public function registerUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->restaurant = $request->restaurant;
        $user->save();
    }

    public function registerCustomer(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
    }

    public function goToRegister2($id)
    {
        $user = User::query()->findOrFail($id);
        return view('login.register2');
    }

    public function registerUser2(Request $request)
    {
        $user = new User();
        $user->restaurant = $request->restaurant;
        $user->save();
    }
}
