<?php

namespace App\Providers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->share('cartItems', Cart::instance('cart')->content());
    }
}
