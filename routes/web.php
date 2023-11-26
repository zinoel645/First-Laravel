<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('user_store', [AuthController::class, 'store'])->name('user_store');
Route::post('login', [AuthController::class, 'process_login'])->name('process_login');

Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/store', [CartController::class, 'addToCart'])->name('cart.store');



Route::middleware('auth')->group(function(){
    Route::get('my_acc', [UserController::class, 'index'])->name('user.index');
});
//Middleware

Route::middleware(['auth', 'auth.admin'])->group(function () {
    Route::get('admin/index', [AdminController::class, 'index'])->name('admin.index');
});
// Route::get('admin', [AdminController::class, 'index'])->name('admin');

Route::get('/', [MainController::class, 'index'])->name('main');

Route::resource("category", CategoryController::class)->except([
    'show',
]);

Route::resource("product", ProductController::class)->except([
    'show',
]);

Route::resource("blog", BlogController::class)->except([
    'show',
]);

Route::get('main', [MainController::class, 'index'])->name('main');

Route::get('expert', [BlogController::class, 'list_detail'])->name('expert');
Route::get('blog_detail/{blog}', [BlogController::class, 'view_detail'])->name('blog_detail');
Route::get('product_detail/{product}', [ProductController::class, 'product_detail'])->name('product_detail');
Route::get('shop', [ProductController::class, 'show_shop'])->name('shop');

Route::get('about_us', function () {
    return view('about_us');
})->name('about_us');
Route::get('contact', function () {
    return view('contact');
})->name('contact');



