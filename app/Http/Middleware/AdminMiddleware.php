<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response  
    {  
        // Kiểm tra xem người dùng đã đăng nhập chưa và có role là 'admin' không  
        if (Auth::check() && Auth::user()->role == 'admin') {  
            return $next($request);     
        } 
        
        // Kiểm tra nếu tài khoản không hoạt động
        if (Auth::check() && !Auth::user()->active) {
            Auth::logout();
            return redirect()->route('homepage')->with('errorLogin', 'Tài khoản của bạn chưa được kích hoạt.');
        }
    
        // Nếu không có quyền, redirect đến trang chủ với thông báo lỗi
        return redirect()->route('homepage')->with('errorLogin', 'Tài khoản của bạn không có quyền');  
    }
    

}
