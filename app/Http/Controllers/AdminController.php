<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $firstDayOfMonth = Carbon::now()->startOfMonth();
        $firstDayOfYear = Carbon::now()->startOfYear();

        $earnMonth = Order::where('status', 2)
                ->where('created_at', '>=', $firstDayOfMonth)->sum('total_price');

        $earnYear = Order::where('status', 2)
                ->where('created_at', '>=', $firstDayOfYear)->sum('total_price');
        $pendingOrder = Order::where('status', 0)->count();
        $deliveringOrder = Order::where('status', 1)->count();

        return view('admin.index', [
            'earnMonth' => $earnMonth,
            'earnYear' => $earnYear,
            'pendingOrder' => $pendingOrder,
            'deliveringOrder' => $deliveringOrder,
        ]);
    }

    public function list_user()
    {
        $data = User::all();
        return view('admin.list_user', [
            'data' => $data
        ]);
    }

    public function delete_user($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.list_user')->with('error', 'User not found');
        }

        $user->delete();

        return redirect()->route('admin.list_user')->with('success', 'User deleted successfully');
    }

    // Controller
    public function list_order()
    {
        $data = Order::with('order_item.product', 'user')->get();
        return view('admin.list_order', [
            'data' => $data,
        ]);
    }

    public function update_status($status, $order_id)
    {
        Order::where('id', $order_id)->update(['status' => $status]);

        return redirect()->route('admin.list_order');

    }


}
