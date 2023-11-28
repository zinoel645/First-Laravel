@extends('admin.admin_master')
@section('admin_content')
    <div class="card">
        <div class="card-header">
            <h3>Edit Category</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('category.update', $each) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $each->name }}">
                    @if ($errors->has('name'))
                        <span class="text-danger">
                            {{ $errors->first('name') }}
                        </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
@endsection
