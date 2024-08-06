<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPhones = Phone::count();
        $totalCategories = Category::count();
        $totalUsers = User::count();
        $totalViews = Phone::sum('quantity'); // Assuming there is a 'views' column

        return view('admin.dashboard', compact('totalPhones', 'totalCategories', 'totalUsers', 'totalViews'));
    }
}
