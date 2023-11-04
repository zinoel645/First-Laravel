@extends('admin.admin_master')
@section('admin_content')
<div class="container">
    <h1 class="text-center mb-4">Add New Product</h1>
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="error">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                    @if ($errors->has('price'))
                        <span class="error">{{ $errors->first('price') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="inventory">Inventory</label>
                    <input type="number" name="inventory" class="form-control" value="{{ old('inventory') }}">
                    @if ($errors->has('inventory'))
                        <span class="error">{{ $errors->first('inventory') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" name="brand" class="form-control" value="{{ old('brand') }}">
                    @if ($errors->has('brand'))
                        <span class="error">{{ $errors->first('brand') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" name="color" class="form-control" value="{{ old('color') }}">
                    @if ($errors->has('color'))
                        <span class="error">{{ $errors->first('color') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                    @if ($errors->has('image'))
                        <span class="error">{{ $errors->first('image') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <h3>Category</h3>
                    @foreach ($categories as $cate)
                        <label>
                            <input type="checkbox" name="categories[]" value="{{ $cate->id }}"> {{ $cate->name }}
                        </label>
                    @endforeach
                    @if ($errors->has('categories'))
                        <br>
                        <span class="error">{{ $errors->first('categories') }}</span>
                    @endif

                    @if ($errors->has('categories.*'))
                        <br>
                        <span class="error">{{ $errors->first('categories.*') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </div>
        </div>
    </form>
</div>
@endsection
