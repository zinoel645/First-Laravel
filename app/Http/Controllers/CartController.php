<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::instance('cart')->content();
        return view('cart', ['cartItems' => $cartItems]);
    }

    public function getCartItems()
    {
        $cartItems = Cart::instance('cart')->content();
        return Response::json(['cartItems' => $cartItems]);
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);
        Cart::instance('cart')->add($product->id, $product->name, $request->quantity, $product->price)->associate('App\Models\Product');
        return redirect()->back()->with('message', 'Add to cart successfully!');
    }

    public function updateCart(Request $request)
    {
        Cart::instance('cart')->update($request->rowId, $request->quantity);
        return redirect()->route('cart.index');
    }

    public function removeItem(Request $request)
    {
        $rowId = $request->rowId;
        Cart::instance('cart')->remove($rowId);
        return redirect()->route('cart.index');
    }

    public function clearCart(Request $request)
    {        
        Cart::instance('cart')->destroy();
        return redirect()->route('cart.index');
    }
}
