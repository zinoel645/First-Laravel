@extends('admin.admin_master')
@section('admin_content')
    <div class="card">
        <div class="card-header">
            <h3>Add New Category</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="categoryName" class="form-label">Name of Category</label>
                    <input type="text" class="form-control" id="categoryName" name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
