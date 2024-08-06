<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CheckTokenMiddleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('test');
// });

// Route::view('/about-us', 'about')->name('page.about');
// Route::get('/users', function () {
//     return "LIST USER";
// });
// //Đường dẫn có tham số
// Route::get('/user/{id}', function (int $id) {
//     return "User ID: $id";
// });
// Route::get(
//     '/user/{id}/comment/{comment_id}',
//     function ($id, $comment_id) {
//         return "User ID: $id - Comment ID: $comment_id";
//     }
// )->where('id', '[0-9]+');

// //Nhóm đường dẫn theo tiền tố
// Route::prefix('admin')->group(function () {
//     Route::get('/product', function () {
//         return "PRODUCT";
//     });
//     Route::get('/users', function () {
//         return "USERS";
//     });
// });

// //Query builder
// Route::get('/posts', function () {
//     //Lấy dữ liệu
//     // $posts = DB::table('posts')->get();
//     //Lấy 10 bản ghi
//     // $posts = DB::table('posts')
//     //     ->select('id', 'title', 'view') //lấy ra cột id, title, view
//     //     ->limit(10)->get();

//     //Update data
//     // DB::table('posts')
//     //     ->where('id', '=', 13)
//     //     ->update([
//     //         'title' => 'Dữ liệu được cập nhật'
//     //     ]);

//     //Delete data
//     // DB::table('posts')->delete(18);
//     //Lấy ra các bài viết có lượt view > 800
//     // $posts = DB::table('posts')
//     //     ->where('view', '>', 800)
//     //     ->get();

//     //Nối 2 bảng posts và categories
//     $posts = DB::table('posts')
//         ->join('categories', 'cate_id', '=', 'categories.id')
//         ->get();
//     return view('post-list', compact('posts'));
// });

//login/register
Route::get('/login', [LoginController::class,'login'])->name('login');
Route::post('/login', [LoginController::class,'postLogin'])->name('postLogin');

Route::get('/logout', [LoginController::class,'logout'])->name('logout');

Route::get('/register', [LoginController::class,'register'])->name('register');
Route::post('/register', [LoginController::class,'postRegister'])->name('postRegister');    

Route::get('/', function(){
    return view('welcome');

})->middleware(CheckTokenMiddleware::class);


Route::get('/test', [PostController::class, 'test'])->name('test'); 
Route::middleware(AdminMiddleware::class)->group(function(){
    Route::get('/phones', [PhoneController::class,'index'])->name('phones.index');
    Route::get('/phones/create', [PhoneController::class,'create'])->name('phone.create');
    Route::post('/phones/create', [PhoneController::class,'store'])->name('phone.store');
    Route::get('/phones/edit/{phone}', [PhoneController::class,'edit'])->name('phone.edit');
    Route::put('/phones/edit/{phone}', [PhoneController::class,'update'])->name('phone.update');
    Route::delete('/phones/delete/{phone}', [PhoneController::class,'destroy'])->name('phone.destroy');
});

Route::get('/', function () {
    $topPricedPhones = DB::table('phones')
        ->select('*')
        ->orderBy('price', 'desc')
        ->limit(8)
        ->get();

    $lowestPricedPhones = DB::table('phones')
        ->select('*')
        ->orderBy('price', 'asc')
        ->limit(8)
        ->get();

    $categories = DB::table('categories')->get();
    

    return view('homepage', compact('topPricedPhones', 'lowestPricedPhones', 'categories'));
})->name('homepage');


Route::get('/phone/{id}', function ($id) {  
    $categories = DB::table('categories')->get();  
    $phone = DB::table('phones')->where('id', $id)->first();  

    // Lấy tên loại từ bảng categories  
    $categoryName = DB::table('categories')  
        ->where('id', $phone->category_id) // Sử dụng category_id từ phone  
        ->value('name');  

    return view('phone_details', compact('phone', 'categories', 'categoryName'));  
});  

Route::get('/phones/category/{category_id}', function ($category_id) {  
    $categories = DB::table('categories')->get();  
    $phonesCategory = DB::table('phones')->where('category_id', '=', $category_id)->get();  
    $categoryName = DB::table('categories')->where('id', $category_id)->value('name');  

    return view('phonescategory', compact('phonesCategory', 'categories', 'categoryName'));  
})->name('phones.detail');  

// Các route khác...

Route::middleware(['auth', 'admin'])->group(function () {  

    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users.index');  
    Route::post('/admin/users/{user}/activate', [AdminController::class, 'activate'])->name('admin.users.activate');  


// doi mat khau

});
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');  
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update'); 
// Đặt route xóa người dùng
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/password/change', [UserController::class, 'showChangePasswordForm'])->name('password.change');
Route::post('/password/change', [UserController::class, 'changePassword'])->name('password.change.post');

// Định nghĩa route cho trang danh sách người dùng  
Route::get('/users', [UserController::class, 'index'])->middleware('auth', 'admin')->name('users.index');  

// Định nghĩa route để thay đổi trạng thái người dùng  
Route::post('/users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->middleware('auth', 'admin')->name('users.toggle-status');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});




Route::get('/cart', [CartController ::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/buy-now', [CartController::class, 'buyNow'])->name('cart.buyNow');


