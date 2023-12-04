@extends('admin.admin_master')
@section('admin_content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <h1>List of Users</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Full name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $each)
                <tr>
                    <td>{{ $each->id }}</td>
                    <td>{{ $each->full_name }}</td>
                    <td>{{ $each->email }}</td>
                    <td>{{ $each->phone }}</td>
                    <td>{{ $each->address }}</td>
                    <td>{{ $each->created_at }}</td>
                    <td>
                        <form action="{{ route('list_user.destroy', ['user' => $each->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this user?")) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
@endsection
