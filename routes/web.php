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
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/user_store', [AuthController::class, 'store'])->name('user_store');
Route::post('/login', [AuthController::class, 'process_login'])->name('process_login');

Route::get('/cart/index', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/store', [CartController::class, 'addToCart'])->name('cart.store');
Route::put('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove', [CartController::class, 'removeItem'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');



Route::middleware('auth')->group(function(){
    Route::get('/my_acc', [UserController::class, 'index'])->name('user.index');
});
//Middleware

Route::middleware(['auth', 'auth.admin'])->group(function () {
    Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
});
// Route::get('admin', [AdminController::class, 'index'])->name('admin');

Route::get('/', [MainController::class, 'index'])->name('main.index');

Route::resource("/category", CategoryController::class)->except([
    'show',
]);

Route::resource("/product", ProductController::class)->except([
    'show',
]);

Route::resource("/blog", BlogController::class)->except([
    'show',
]);

Route::get('/main/index', [MainController::class, 'index'])->name('main.index');

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



