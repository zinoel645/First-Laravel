<a href="{{ route('product.create') }}">Add new product</a>
<table border="1" width="100%">
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
        <th>Update at</th>
        <th>Action</th>
    </tr>
    @php $currentProductId = null; @endphp
    @foreach ($data as $product)
        @if ($currentProductId != $product->id)
            @php $currentProductId = $product->id; @endphp
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td><img src="{{ asset('storage/images/' . $product->image) }}" style="height: 80px;width:80px;"></td>
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
                    <form action="{{ route('product.destroy', ['product' => $product->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                    <a href="{{ route('product.edit', ['product' => $product->id]) }}">Edit</a>
                </td>
            </tr>
        @endif
    @endforeach
</table>
