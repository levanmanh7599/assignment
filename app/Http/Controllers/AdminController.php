<?php

namespace App\Http\Controllers;

use App\Models\User;
class AdminController extends Controller  
{  
    public function index()  
    {  
        $users = User::all();  
        return view('users.index', compact('users'));  
    }  

    public function activate(User $user)  
    {  
        $user->active = $user->active ? 0 : 1; // Đảo ngược trạng thái  
        $user->save();  

        return redirect()->route('admin.users.index')->with('success', 'Tài khoản đã được cập nhật!');  
    }  
}