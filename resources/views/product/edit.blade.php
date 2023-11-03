<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            transform: scale(0.9);
            /* Zoom out to 90% */
            transform-origin: top center;
        }

        h1 {
            text-align: center;
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .error {
            color: red;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Edit Product</h1>
    <div class="container">
        <form action="{{ route('product.update', $each) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" value="{{ $each->name }}">
                @if ($errors->has('name'))
                    <span class="error">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" name="color" value="{{ $each->color }}">
                @if ($errors->has('color'))
                    <span class="error">{{ $errors->first('color') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" value="{{ $each->price }}">
                @if ($errors->has('price'))
                    <span class="error">{{ $errors->first('price') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="inventory">Inventory</label>
                <input type="number" name="inventory" value="{{ $each->inventory }}">
                @if ($errors->has('inventory'))
                    <span class="error">{{ $errors->first('inventory') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" name="brand" value="{{ $each->brand }}">
                @if ($errors->has('brand'))
                    <span class="error">{{ $errors->first('brand') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="image">Keep Image</label>
                <img src="{{ asset('storage/images/' . $each->image) }}" class="img-fluid" alt="Product Image">
            </div>

            <div class="form-group">
                <label for="image">Or Update Image</label>
                <input type="file" name="image">
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
            <button type="submit">Save Changes</button>
        </form>
    </div>
</body>

</html>
