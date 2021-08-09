<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

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

    public function userCan($action, $option = null)
    {
        $user = Auth::user();
        return Gate::forUser($user)->allows($action, $option);
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
            if ($this->userCan('show-user')) {
                return redirect()->route('admin.food.list');
            }else{
                return redirect()->route('food.list');
            }
        }else{
            session()->flash('login_error','Account not exists');
            return redirect()->route('login.goToLogin');
        }
    }

    public function registerUser(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role_id = 3;
        $user->restaurant = $request->restaurant;
        $user->save();
    }

    public function registerCustomer(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role_id = 1;
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

    public function logout()
    {
        Session::flush();
        return redirect()->route('login.goToLogin');
    }
}
