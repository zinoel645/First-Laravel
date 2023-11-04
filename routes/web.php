<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::resource("category", CategoryController::class)->except([
    'show',
]);

Route::resource("product", ProductController::class)->except([
    'show',
]);
Route::get('main', function () {
    return view('main');
})->name('main');
Route::get('expert', function () {
    return view('expert_corner');
})->name('expert');
Route::get('about_us', function () {
    return view('about_us');
})->name('about_us');
Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::get('admin', function () {
    return view('admin.index');
})->name('admin');
