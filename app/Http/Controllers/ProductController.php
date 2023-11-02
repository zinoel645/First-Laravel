<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $data = DB::table('products')
            ->join('category_product', 'products.id', '=', 'category_product.product_id')
            ->join('categories', 'categories.id', '=', 'category_product.category_id')
            ->select('products.*', 'categories.name as category_name')
            ->get();

        return view('product.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        $parentcate = Category::skip(0)->take(3)->get();
        $childcate = Category::skip(3)->take(5)->get();
        return view('product.create', [
            'parentcate' => $parentcate,
            'childcate' => $childcate,
        ]);
    }

    public function store(Request $request)
    {
        // $request->validated();
        $request->validate([
            'name' => 'required',
            'color' => 'required',
            'price' => 'required',
            'brand' => 'required',
            'inventory' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categories' => 'required',
        ]);

        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $fileName);
          
        $product = new Product;
        $product->name = $request->input('name');
        $product->color = $request->input('color');
        $product->price = $request->input('price');
        $product->brand = $request->input('brand');
        $product->inventory = $request->input('inventory');
        $product->image = $fileName;
        $product->save();

        $selectedCategories = $request->input('categories', []);

        foreach ($selectedCategories as $cateId) {
            CategoryProduct::create([
                'product_id' => $product->id,
                'category_id' => $cateId,

            ]);

        }
        return redirect()->route('product.index');
    }

    public function edit(Category $category)
    {
        return view('product.edit', [
            'each' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, $category)
    {
        Category::where('id', $category)->update($request->validated());
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('product.index');
    }
}
