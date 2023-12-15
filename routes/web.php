<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/verify', [AuthController::class, 'check_otp'])->name('verify');
Route::get('/verify_form', [AuthController::class, 'showVerifyForm'])->name('verify_form');
Route::post('/user_store', [AuthController::class, 'store'])->name('user_store');
Route::post('/login', [AuthController::class, 'process_login'])->name('process_login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/expert/index', [BlogController::class, 'list_detail'])->name('expert.index');
Route::get('/blog_detail/{blog}', [BlogController::class, 'view_detail'])->name('blog_detail');
Route::get('/shop/product_detail/{product}', [ShopController::class, 'product_detail'])->name('product_detail');
Route::get('/shop/index', [ShopController::class, 'index'])->name('shop.index');
Route::get('/about_us/index', function () {
    return view('about_us');
})->name('about_us.index');
Route::get('/contact/index', function () {
    return view('contact');
})->name('contact.index');

//Middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/user/index', [UserController::class, 'index'])->name('my_acc');
    Route::get('/cart/index', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/store', [CartController::class, 'addToCart'])->name('cart.store');
    Route::put('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::delete('/cart/remove', [CartController::class, 'removeItem'])->name('cart.remove');
    Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
    Route::get('/cart/check_out', [CartController::class, 'check_out'])->name('cart.checkout');
    Route::post('/cart/check_out/store', [CartController::class, 'store_order'])->name('process_checkout');
    Route::get('user_order/update/{status}/{order_id}', [UserController::class, 'update_status'])->name('user_order.update');
});
//Middleware admin
Route::middleware(['auth', 'auth.admin'])->group(function () {
    Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/list_user', [AdminController::class, 'list_user'])->name('admin.list_user');
    Route::delete('/list_user/{user}', [AdminController::class, 'delete_user'])->name('list_user.destroy');
    Route::resource("/category", CategoryController::class)->except([
        'show',
    ]);
    Route::resource("/product", ProductController::class)->except([
        'show',
    ]);
    Route::resource("/blog", BlogController::class)->except([
        'show',
    ]);
    Route::get('/admin/list_order', [AdminController::class, 'list_order'])->name('admin.list_order');
    Route::get('list_order/update/{status}/{order_id}', [AdminController::class, 'update_status'])->name('list_order.update');
});




