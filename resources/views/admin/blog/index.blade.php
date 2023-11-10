@extends('admin.admin_master')
@section('admin_content')
<div class="container mt-5">
    <h1 class="mb-4">Product List</h1>
    <a href="{{ route('blog.create') }}" class="btn btn-primary mb-3">Create Blog Post</a>
    <form class="mb-3">
        <div class="form-group">
            <label for="search">Search:</label>
            <input type="search" class="form-control" name="q" value="{{ $search }}">
        </div>
    </form>

    <table class="table table-bordered">
        <caption class="caption-top">
            <h4>List of Blogs</h4>
        </caption>
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Image</th>
                <th>Content</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $each)
            <tr>
                <td>{{ $each->id }}</td>
                <td>{{ $each->title }}</td>
                <td>
                    <img src="{{ asset('storage/images/' . $each->image) }}" style="height: 80px; width: 80px;">
                </td>
                <td>{{ $each->content }}...</td>
                <td>{{ $each->created_at }}</td>
                <td>{{ $each->updated_at }}</td>
                <td>
                    <form action="{{ route('blog.destroy', ['blog' => $each->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    <a href="{{ route('blog.edit', ['blog' => $each->id]) }}"
                        class="btn btn-primary btn-sm">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
</div>    
@endsection