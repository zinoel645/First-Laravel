<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{

    public function index()
    {
        $data = Category::all();
        return view('admin.product.category.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('admin.product.category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        dd($category);
        return view('admin.product.category.edit', [
            'each' => $category,
        ]);
    }

    public function update(UpdateCategoryRequest $request, $category)
    {
        Category::where('id', $category)->update($request->validated());
        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
