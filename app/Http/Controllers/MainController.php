<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class MainController extends Controller
{

    public function index(Request $request)
    {
        $data = Blog::all();
        $pr_data = Product::orderBy("created_at", "desc")->get();
        $category = $request->input('category', 1); // Giả sử mặc định là Wall Ceramic Tiles (ID = 1)
        $cate_data = DB::table('products')
            ->join('category_product', 'products.id', '=', 'category_product.product_id')
            ->select('products.*')
            ->where('category_product.category_id', '=', $category)
            ->take(4)
            ->get();
        return view('main', [
            'data' => $data,
            'pr_data' => $pr_data,
            'cate_data' => $cate_data
        ]);
    }
}
