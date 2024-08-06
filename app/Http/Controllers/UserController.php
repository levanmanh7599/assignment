<?php
// UserController.php  
namespace App\Http\Controllers;  

use App\Models\User;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller  
{  
    public function index()  
    {  
        $users = User::all();  
        return view('users.index', compact('users'));  
    }  

    public function toggleStatus(User $user)  
    {  
        $user->active = !$user->active; // Đảo ngược trạng thái  
        $user->save();  

        return redirect()->route('users.index')->with('message', 'Thay đổi trạng thái thành công!');  
    }  

    public function showChangePasswordForm()  
    {  
        return view('change_password');  
    }  

    public function changePassword(Request $request)  
    {  
        // Validate input  
        $request->validate([  
            'current_password' => 'required',  
            'new_password' => 'required|confirmed',  
        ]);  

        $user = Auth::user();  

        // Check if the current password is correct  
        if (!Hash::check($request->current_password, $user->password)) {  
            return redirect()->back()->withErrors(['current_password' => 'Mật khẩu cũ không chính xác.']);  
        }  

        // Update password  
        if ($user instanceof User) {  
            $user->password = Hash::make($request->new_password);  
            $user->save(); 
        } else {  
           
        }

        return redirect()->route('password.change')->with('success', 'Mật khẩu đã được đổi thành công!');  
    } 
    
    public function destroy(User $user)
    {
        if (Auth::id() === $user->id) {
            return redirect()->route('users.index')->with('message','Bạn không thể xóa chính mình.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('message', 'Người dùng đã được xóa thành công.');
    }
     
}