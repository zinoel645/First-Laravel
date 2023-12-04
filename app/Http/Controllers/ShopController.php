<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');
        $cateId = $request->get('cate');
        $subCateId = $request->get('subcate');

        $page = $request->query('page');
        $size = $request->query('size');
        if (!$page)
            $page = 1;
        if (!$size)
            $size = 9;
        $order = $request->query('order');

        if (!$order)
            $order = -1;
        $o_column = "";
        $o_order = "";
        switch ($order) {
            case 1:
                $o_column = "created_at";
                $o_order = "DESC";
                break;
            case 2:
                $o_column = "created_at";
                $o_order = "ASC";
                break;
            case 3:
                $o_column = "price";
                $o_order = "ASC";
                break;
            case 4:
                $o_column = "price";
                $o_order = "DESC";
                break;
            default:
                $o_column = "created_at";
                $o_order = "DESC";
                break;
        }

        $prange = $request->query('prange');
        if (!$prange)
            $prange = "0,20";
        $from = explode(",", $prange)[0];
        $to = explode(",", $prange)[1];

        $data = Product::with('category_product.category')
            ->when($cateId, function ($query) use ($cateId) {
                $query->whereHas('category_product.category', function ($categoryQuery) use ($cateId) {
                    $categoryQuery->where('categories.id', 'like', '%' . $cateId . '%');
                });
            })
            ->when($subCateId, function ($query) use ($subCateId) {
                $query->whereHas('category_product.category', function ($categoryQuery) use ($subCateId) {
                    $categoryQuery->where('categories.id', 'like', '%' . $subCateId . '%');
                });
            })
            ->when($search, function ($query) use ($search) {
                $query->where('products.name', 'like', '%' . $search . '%')
                    ->orWhere('products.color', 'like', '%' . $search . '%')
                    ->orWhereHas('category_product.category', function ($categoryQuery) use ($search) {
                        $categoryQuery->where('categories.name', 'like', '%' . $search . '%');
                    });
            })
            ->whereBetween('price', array($from, $to))->orderBy($o_column, $o_order)->paginate($size);
        $data->getCollection()->transform(function ($product) {
            $categories = $product->category_product->map(function ($categoryProduct) {
                return $categoryProduct->category->name;
            });
            return $product->setAttribute('cate', $categories);
        });

        $data->appends(['q' => $search]);

        return view('shop', [
            'data' => $data,
            'search' => $search,
            'page' => $page,
            'size' => $size,
            'order' => $order,
            'from' => $from,
            'to' => $to,
        ]);
    }

    public function product_detail(Product $product)
    {
        $each = Product::with('category_product.category')->where('id', $product->id)->first();

        if (!$each) {
            abort(404, 'Product does not exist');
        }

        $each->setAttribute('cate', $each->category_product->map(function ($categoryProduct) {
            return $categoryProduct->category->name;
        })->implode(','));

        return view('product_detail', [
            'each' => $each,
        ]);
    }
}
