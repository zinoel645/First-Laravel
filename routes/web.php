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