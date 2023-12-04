<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

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
        if ($product) {
            if ($product->inventory >= $request->quantity) {
                Cart::instance('cart')->add($product->id, $product->name, $request->quantity, $product->price)->associate('App\Models\Product');

                return redirect()->back()->with('message', 'Add to cart successfully!');
            } else {
                return redirect()->route('product_detail')->with('error', 'Not enough inventory available!');
            }
        } else {
            return redirect()->back()->with('error', 'Product not found!');
        }
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

    public function miniDelete(Request $request)
    {
        $rowId = $request->rowId;
        Cart::instance('cart')->remove($rowId);
        return redirect()->back();
    }

    public function clearCart(Request $request)
    {
        Cart::instance('cart')->destroy();
        return redirect()->route('cart.index');
    }

    public function check_out()
    {
        $cartItems = Cart::instance('cart')->content();
        return view('check_out', [
            'cartItems' => $cartItems,
        ]);
    }

    public function store_order(Request $request)
    {
        $orderData = [
            'user_id' => $request->input('id'),
            'name_receiver' => $request->input('name_receiver'),
            'phone_receiver' => $request->input('phone_receiver'),
            'address' => $request->input('address'),
            'total_price' => $request->input('total_price'),
            'purchase_method' => $request->input('purchase_method'),
        ];

        $order = Order::create($orderData);

        $productIds = $request->input('product_ids');
        $quantities = $request->input('quantities');

        foreach (array_combine($productIds, $quantities) as $productId => $quantity) {
            $orderItemData = [
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $quantity,
            ];

            OrderItem::create($orderItemData);

            $product = Product::find($productId);
            $newInventory = $product->inventory - $quantity;
            Product::where('id', $productId)->update(['inventory' => $newInventory]);
        }

        Cart::instance('cart')->destroy();
        session()->flash('done-checkout', 'Check out successfully.');
        return redirect()->route('my_acc');
    }
}

