<a href="{{ route('product.create') }}">Add new product</a>
<h1>List of Categories</h1>
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
    @foreach ($data as $each)
        <tr>
            <td>{{ $each->id }}</td>
            <td>{{ $each->name }}</td>
            <td>{{ $each->price }}</td>
            <td>{{ $each->image }}</td>
            <td>{{ $each->inventory }}</td>
            <td>{{ $each->brand }}</td>
            <td>{{ $each->color }}</td>
            <td>{{ $each->category_name }}</td>
            <td>{{ $each->created_at }}</td>
            <td>{{ $each->updated_at }}</td>
        <td>
            <form action="{{ route('category.destroy', ['category'=>$each->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
            <a href="{{ route('category.edit', ['category'=>$each->id]) }}">Edit</a>
        </td>
        </tr>
    @endforeach
</table>
