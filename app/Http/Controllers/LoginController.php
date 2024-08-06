<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $data = $request->only(['email', 'password']);
        if (Auth::attempt($data)) {
            $user = Auth::user();
            if ($user->active) {
                return redirect()->route('phones.index');
            } else {
                Auth::logout();
                return redirect()->back()->with('errorLogin', 'Tài khoản của bạn chưa được kích hoạt.');
            }
        } else {
            return redirect()->back()->with('errorLogin', 'Email hoặc Password không chính xác');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function register()
    {
        return view('register');
    }

    public function postRegister(Request $request)  
    {
        $data = $request->except('avatar'); 
        $data['avatar'] = '';
        $data['active'] = 1; 

        if ($request->hasFile('avatar')) {
            $path_avatar = $request->file('avatar')->store('avatars', 'public'); 
            $data['avatar'] = $path_avatar;
        }

        User::create($data);
        return redirect()->route('login')->with('message', 'Đăng ký tài khoản thành công');
    }

    public function listUsers()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
}
