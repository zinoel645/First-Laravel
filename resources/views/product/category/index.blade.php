<a href="{{ route('category.create') }}">Add new category</a>
<h1>List of Categories</h1>
<table border="1" width="100%">
    <tr>
        <th>#</th>
        <th>Name of Category</th>
        <th>Created at</th>
        <th>Action</th>
    </tr>
    @foreach ($data as $each)
        <tr>
            <td>{{ $each->id }}</td>
            <td>{{ $each->name }}</td>
            <td>{{ $each->date_created_at }}</td>
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
