$fileName = time() . '.' . $request->file('image')->extension();
    $request->file('image')->storeAs('public/images', $fileName);

    $product = Product::create($request->only(['name', 'color', 'brand', 'inventory']) + ['image' => $fileName]);

    $selectedCategories = $request->input('categories', []);

    $categoryProductData = [];

    foreach ($selectedCategories as $cateId) {
        $categoryProductData[] = [
            'product_id' => $product->id,
            'category_id' => $cateId,
        ];
    }

    CategoryProduct::insert($categoryProductData);

    return redirect()->route('product.index');