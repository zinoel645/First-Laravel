<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
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
                    @php $currentProductId = null; @endphp
                    @foreach ($data as $product)
                        @if ($currentProductId != $product->id)
                            @php $currentProductId = $product->id; @endphp
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
                                @foreach ($data as $each)
                                    @if ($each->id == $product->id)
                                        {{ $each->category_name }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $product->created_at }}</td>
                            <td>{{ $product->updated_at }}</td>
                            <td>
                                <form action="{{ route('product.destroy', ['product' => $product->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                <a href="{{ route('product.edit', ['product' => $product->id]) }}"
                                    class="btn btn-primary btn-sm">Edit</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
