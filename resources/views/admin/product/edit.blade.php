@extends('admin.admin_master')
@section('admin_content')
    <div class="container">
        <h1 class="text-center mb-4">Edit Product</h1>
        <form action="{{ route('product.update', $each) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" name="name" value="{{ $each->name }}" class="form-control">
                        @if ($errors->has('name'))
                            <span class="error">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" name="color" value="{{ $each->color }}" class="form-control">
                        @if ($errors->has('color'))
                            <span class="error">{{ $errors->first('color') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" value="{{ $each->price }}" class="form-control">
                        @if ($errors->has('price'))
                            <span class="error">{{ $errors->first('price') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="inventory">Inventory</label>
                        <input type="number" name="inventory" value="{{ $each->inventory }}" class="form-control">
                        @if ($errors->has('inventory'))
                            <span class="error">{{ $errors->first('inventory') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input type="text" name="brand" value="{{ $each->brand }}" class="form-control">
                        @if ($errors->has('brand'))
                            <span class="error">{{ $errors->first('brand') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <br>
                        <label for="image">Keep Image</label>
                        <img src="{{ asset('storage/images/' . $each->image) }}" class="img-fluid d-block mx-auto" height="200" alt="Product Image">
                        <br>
                    </div>

                    <div class="form-group">
                        <label for="image">Or Update Image</label>
                        <input type="file" name="image" class="form-control-file">
                        @if ($errors->has('image'))
                            <span class="error">{{ $errors->first('image') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <h3>Category</h3>
                        @foreach ($categories as $cate)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="categories[]" value="{{ $cate->id }}"
                                    {{ in_array($cate->id, $datas->pluck('cate_product_id')->toArray()) ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $cate->name }}</label>
                            </div>
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
                    <button type="submit" class="btn btn-primary d-block mx-auto">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
@endsection
