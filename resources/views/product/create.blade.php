<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    Name of Product
    <input type="text" name="name" value="{{ old('name') }}">
    <br>
    Price
    <input type="number" name="price" value="{{ old('price') }}">
    <br>
    Image
    <input type="file" name="image" value="{{ old('image') }}">
    <br>
    Inventory
    <input type="number" name="inventory" value="{{ old('inventory') }}">
    <br>
    Brand
    <input type="text" name="brand" value="{{ old('brand') }}">
    <br>
    Color
    <input type="text" name="color" value="{{ old('color') }}">
    <br>
    Category
    @foreach ($parentcate as $pcate)
    <input type="checkbox" name='categories[]' value="{{ $pcate->id }}">{{ $pcate->name }}
    @endforeach
    @foreach ($childcate as $ccate)
    <br>
    <input type="checkbox" name='categories[]' value="{{ $ccate->id }}">{{ $ccate->name }}
    @endforeach
    
    @if ($errors->has('name'))
        <span class="error">
            {{ $errors->first('name') }}
        </span>
    @endif

    <br>
    <button>Add</button>
</form>
