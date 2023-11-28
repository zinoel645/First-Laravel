@extends('admin.admin_master')
@section('admin_content')
    <a href="{{ route('category.create') }}" class="btn btn-warning mb-3">Add New Category</a>
    <h1>List of Categories</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name of Category</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $each)
                <tr>
                    <td>{{ $each->id }}</td>
                    <td>{{ $each->name }}</td>
                    <td>{{ $each->date_created_at }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Action buttons">
                            <a href="{{ route('category.edit', ['category' => $each->id]) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('category.destroy', ['category' => $each->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
