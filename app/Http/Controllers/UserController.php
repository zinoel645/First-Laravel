<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = Order::with('order_item.product')->get();

        return view('user.index', [
            'data' => $data
        ]);

    }

    public function update_status($status, $order_id) {
        Order::where('id', $order_id)->update(['status' => $status]);
        return redirect()->route('my_acc');
    }
}
