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
            ->paginate(9);
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
