@extends('admin.admin_master')
@section('admin_content')
    <div class="container">
        <h1 class="text-center mb-4">Create Blog Post</h1>
        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Title Name</label>
                        <input type="text" name="title" class="form-control"
                        value="{{ old('title') }}">
                        @if ($errors->has('title'))
                            <span class="error">{{ $errors->first('title') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="content">Content of Blog</label>
                        <textarea class="form-control" name="content" id="content" cols="60" rows="80">{{ old('content') }}</textarea>
                        @if ($errors->has('content'))
                            <span class="error">{{ $errors->first('content') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                        @if ($errors->has('image'))
                            <span class="error">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Add Blog</button>
                </div>
            </div>
        </form>
    </div>
@endsection
