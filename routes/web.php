<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('admin', function () {
    return view('admin.index');
})->name('admin');
