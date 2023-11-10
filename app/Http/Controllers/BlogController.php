<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BlogController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('q');
        $data = Blog::query()
            ->where('blogs.title', 'like', '%' . $search . '%')
            ->paginate(5);

        foreach ($data as $blog) {
            $blog->content = substr($blog->content, 0, 300);
        }

        $data->appends(['q' => $search]);
        return view('admin.blog.index', [
            'data' => $data,
            'search' => $search,
        ]);
    }

    // public function view_detail($id)
    // {
    //     $each = DB::table('blogs')
    //         ->where('id', $id)
    //         ->first();


    public function view_detail(Blog $blog)
    {
        return view('blog_detail', [
            'each' => $blog,
        ]);
    }


    public function list_detail()
    {
        $data = Blog::all();

        return view('expert_corner', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(StoreBlogRequest $request)
    {
        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $fileName);

        $validatedData = $request->validated();

        Blog::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'image' => $fileName
        ]);
        return redirect()->route('blog.index');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', [
            'each' => $blog,
        ]);
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $fileName);
            $blog->image = $fileName;
        }

        $validatedData = $request->validated();
        unset($validatedData['image']); // Loại bỏ cột image khỏi dữ liệu đã xác thực
        $blog->update($validatedData);

        return redirect()->route('blog.index');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index');
    }
}
