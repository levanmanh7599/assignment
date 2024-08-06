<?php  

namespace App\Http\Controllers;  

use Illuminate\Http\Request;  
use App\Models\User;  
use Illuminate\Support\Facades\Auth;  
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller  
{  
    public function show()  
    {  
        $user = Auth::user();  
        $isUserRole = $user->role === 'user'; // Kiểm tra xem người dùng có vai trò là 'user' không  
        return view('profile.show', compact('user', 'isUserRole'));
    }

    public function update(Request $request)  
    {  
        // Validate input data  
        $request->validate([  
            'username' => 'required|string|max:255',  
            'email' => 'required|email|max:255',  
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validate image  
        ]);  
    
        // Get the current authenticated user  
        $user = Auth::user();  
    
        // Check if the user is authenticated  
        if (!$user) {  
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thực hiện hành động này.');  
        }  
    
        // Store the old avatar path  
        $old_avatar = $user->avatar;  
    
        // Update user information  
        $user->username = $request->username;  
        $user->email = $request->email;  
    
        // If a new avatar is uploaded  
        if ($request->hasFile('avatar')) {  
            // Store the new avatar and update the path  
            $path_avatar = $request->file('avatar')->store('avatars', 'public'); // Store in 'public' disk  
            $user->avatar = $path_avatar;  
    
            // Delete the old avatar if it exists  
            if ($old_avatar && Storage::disk('public')->exists($old_avatar)) {  
                Storage::disk('public')->delete($old_avatar);  
            }  
        }  
    
        // Save changes to the database  
        if ($user instanceof User) {    
            $user->save(); // Kiểm tra xem có xảy ra lỗi ở đây không  
        } else {  
           
        } 
    
        // Redirect to the profile show page with a success message  
        return redirect()->route('profile.show')->with('message', 'Cập nhật thông tin thành công!');  
    }
 
}
