<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::instance('cart')->content();
        return view('cart', ['cartItems' => $cartItems]);
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);
        Cart::instance('cart')->add($product->id, $product->name, $request->quantity, $product->price)->associate('App\Models\Product');
        return redirect()->back()->with('message', 'Add to cart successfully!');
    }

    public function updateCart(Request $request)
    {
        $id = $request->input('id');
        $action = $request->input('action');
        $cartItem = Cart::find($id);
        if ($action === 'plus') {
            $cartItem->quantity += 1;
        }

        $cartItem->save();

        return response()->json(['message' => 'Cart item updated successfully']);
    }
}
