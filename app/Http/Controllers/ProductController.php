<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');

        $data = Product::with('category_product.category')
            ->when($search, function ($query) use ($search) {
                $query->where('products.name', 'like', '%' . $search . '%')
                    ->orWhere('products.color', 'like', '%' . $search . '%')
                    ->orWhereHas('category_product.category', function ($categoryQuery) use ($search) {
                        $categoryQuery->where('categories.name', 'like', '%' . $search . '%');
                    });
            })
            ->paginate(8);
        $data->getCollection()->transform(function ($product) {
            $categories = $product->category_product->map(function ($categoryProduct) { //$categoryProduct là một đối tượng từ mỗi quan hệ category_product. Nó là một bản ghi trong bảng chéo (pivot table) kết nối giữa bảng products và categories.
                return $categoryProduct->category->name;
                //$categoryProduct->category: Đây là một truy vấn để lấy đối tượng Category liên quan đến CategoryProduct. Nó sử dụng mối quan hệ belongsTo để xác định quan hệ giữa CategoryProduct và Category.
            })->implode(', ');
            return $product->setAttribute('cate', $categories);
        });


        $data->appends(['q' => $search]);

        return view('admin.product.index', [
            'data' => $data,
            'search' => $search,
        ]);
    }

    public function create()
    {
        $categories = DB::table('categories')
            ->select('*')
            ->get();
        return view('admin.product.create', [
            'categories' => $categories
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $fileName);

            $validatedData = $request->validated();
            $product = Product::create([
                'name' => $validatedData['name'],
                'color' => $validatedData['color'],
                'brand' => $validatedData['brand'],
                'price' => $validatedData['price'],
                'inventory' => $validatedData['inventory'],
                'image' => $fileName,
            ]);


            $selectedCategories = $request->input('categories', []);

            foreach ($selectedCategories as $cateId) {
                CategoryProduct::create([
                    'product_id' => $product->id,
                    'category_id' => $cateId,

                ]);

            }
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to store the product.']);
        }
    }

    public function edit(Product $product)
    {
        $datas = DB::table('products')
            ->join('category_product', 'products.id', '=', 'category_product.product_id')
            ->join('categories', 'categories.id', '=', 'category_product.category_id')
            ->where('category_product.product_id', $product->id)
            ->select('products.*', 'categories.id as cate_product_id')
            ->get();
        $categories = DB::table('categories')
            ->select('*')
            ->get();

        return view('admin.product.edit', [
            'datas' => $datas,
            'each' => $product,
            'categories' => $categories
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // Kiểm tra xem có tệp ảnh mới được tải lên hay không
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $fileName);
            $product->image = $fileName;
        }

        $validatedData = $request->validated();
        unset($validatedData['categories']);
        unset($validatedData['image']);

        $product->update($validatedData);

        $selectedCategories = $request->input('categories', []);

        DB::table('category_product')->where('product_id', $product->id)->delete();

        if (!empty($selectedCategories)) {
            $categoryProductData = [];
            foreach ($selectedCategories as $categoryId) {
                $categoryProductData[] = [
                    'category_id' => $categoryId,
                    'product_id' => $product->id,
                ];
            }
            DB::table('category_product')->insert($categoryProductData);
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        DB::table('category_product')->where('product_id', $product->id)->delete();
        $product->delete();
        return redirect()->route('product.index');
    }
}
