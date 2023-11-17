@extends('admin.admin_master')
@section('admin_content')
    <div class="container mt-5">
        <h1 class="mb-4">Product List</h1>
        <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">Add New Product</a>
        <form class="mb-3">
            <div class="form-group">
                <label for="search">Search:</label>
                <input type="search" class="form-control" name="q" value="{{ $search }}">
            </div>
        </form>

        <table class="table table-bordered">
            <caption class="caption-top">
                <h4>Products List</h4>
            </caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name of Product</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Inventory</th>
                    <th>Brand</th>
                    <th>Color</th>
                    <th>Category</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <img src="{{ asset('storage/images/' . $product->image) }}"
                                    style="height: 80px; width: 80px;">
                            </td>
                            <td>{{ $product->inventory }}</td>
                            <td>{{ $product->brand }}</td>
                            <td>{{ $product->color }}</td>
                            <td>

                                {{ $product->cate }}
                            </td>
                            <td>{{ $product->created_at }}</td>
                            <td>{{ $product->updated_at }}</td>
                            <td>
                                <form action="{{ route('product.destroy', ['product' => $product->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                <a href="{{ route('product.edit', ['product' => $product->id]) }}"
                                    class="btn btn-primary btn-sm">Edit</a>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
    </div>
@endsection
