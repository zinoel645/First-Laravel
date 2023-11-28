@extends('layout.master')
@section('content')
    <div class="container py-3 d-none d-lg-block">
        <div class="row align-items-center">
            <div class="col-12 rounded-1 " style="background:url('{{ asset('storage/homepage/banner-1.jpg') }}');">
                <h1 class="text-center text-light">Store</h1>
            </div>
        </div>
    </div>
    <div class="container py-3">
        <div class="row">
            <div class="col-12 text-center text-md-start col-lg-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 mb-md-0 justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a href="./home.php" class="fs-6">Home</a></li>
                        <li class="breadcrumb-item active fs-6" aria-current="page">Shop</li>
                    </ol>
                </nav>
            </div>
            <div class="col-12 col-lg-4">
                <h1 class="text-center d-lg-none">Store</h1>
            </div>
            <div class="col-2 d-lg-none">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasStore"
                    aria-controls="offcanvasStore">
                    <i class="fa-solid fa-filter"></i>
                </button>
                <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasStore"
                    aria-labelledby="offcanvasStoreLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasStoreLabel">Filter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                    </div>
                </div>
            </div>
            <div class="col-10 text-center text-md-end col-lg-4">
                <form class="d-flex">
                    <input style="margin-right: 5px;" type="search" class="form-control rounded" name="q"
                        value="{{ $search }}">
                    <button class="btn btn-outline-primary">Search</button>
                </form>
            </div>

        </div>
    </div>
    <!-- Heading -->

    <!-- Main content -->
    <div class="container py-3">
        <div class="row">
            <div class="d-none col-lg-3 d-lg-block border rounded-1 p-3 filter_offcanvas">

                <h4>Bộ lọc sản phẩm</h4>
                <h2>Color</h2>
                <input type="radio" name="color" value="white" onclick="filter_color('white')">
                <label for="color">White</label>
                <br>
                <input type="radio" name="color" value="yellow" onclick="filter_color('yellow')">
                <label for="color">Yellow</label>
                <br>
                <input type="radio" name="color" value="orange" onclick="filter_color('orange')">
                <label for="color">Orange</label>
                <br>
                <input type="radio" name="color" value="red" onclick="filter_color('red')">
                <label for="color">Red</label>
                <br>
                <input type="radio" name="color" value="brown" onclick="filter_color('brown')">
                <label for="color">Brown</label>
                <br>
                <input type="radio" name="color" value="pink" onclick="filter_color('pink')">
                <label for="color">Pink</label>
                <br>
                <input type="radio" name="color" value="black" onclick="filter_color('black')">
                <label for="color">Black</label>
                <br>
                <input type="radio" name="color" value="" checked="checked" onclick="filter_color('')">
                <label for="color">All</label>
                <br>

                <h2>Brand</h2>
                <input type="radio" name="brand" value="Viglacera" onclick="filter_brand('Viglacera')">
                <label for="brand">Viglacera</label>
                <br>
                <input type="radio" name="brand" value="Bach Ma Tiles" onclick="filter_brand('Bach Ma Tiles')">
                <label for="brand">Bach Ma Tiles</label>
                <br>
                <input type="radio" name="brand" value="Chinese Tiles" onclick="filter_brand('Chinese Tiles')">
                <label for="brand">Chinese Tiles</label>
                <br>
                <input type="radio" name="brand" value="Dong Tam Brick" onclick="filter_brand('Dong Tam Brick')">
                <label for="brand">Dong Tam Brick</label>
                <br>
                <input type="radio" name="brand" value="Eurotile" onclick="filter_brand('Eurotile')">
                <label for="brand">Eurotile</label>
                <br>
                <input type="radio" name="brand" value="" checked="checked" onclick="filter_brand('')">
                <label for="brand">All</label>
                <br>

                <h2>Size</h2>
                <input type="radio" name="size" value="60x60" onclick="filter_size('60x60')">
                <label for="size">60x60</label>
                <br>
                <input type="radio" name="size" value="80x80" onclick="filter_size('80x80')">
                <label for="size">80x80</label>
                <br>
                <input type="radio" name="size" value="45x45" onclick="filter_size('45x45')">
                <label for="size">45x45</label>
                <br>
                <input type="radio" name="size" value="40x80" onclick="filter_size('40x80')">
                <label for="size">40x80</label>
                <br>
                <input type="radio" name="size" value="40x40" onclick="filter_size('40x40')">
                <label for="size">40x40</label>
                <br>
                <input type="radio" name="size" value="25x40" onclick="filter_size('25x40')">
                <label for="size">25x40</label>
                <br>
                <input type="radio" name="size" value="30x60" onclick="filter_size('30x60')">
                <label for="size">30x60</label>
                <br>
                <input type="radio" name="size" value="30x90" onclick="filter_size('30x90')">
                <label for="size">30x90</label>
                <br>
                <input type="radio" name="size" value="" checked onclick="filter_size('')">
                <label for="size">All</label>
                <br>

            </div>

            <div class="col-12 col-lg-9">
                <div class="row" id="filter">
                    @foreach ($data as $each)
                        <div class="col-6 col-md-4 mb-3 mb-md-3 px-2">
                            <div class="card h-100 ">
                                <a href="{{ route('product_detail', ['product' => $each->id]) }}">
                                    <img src="{{ asset('storage/images/' . $each->image) }}" alt=""
                                        width="100%" height="300px">
                                </a>
                                <div class="card-body set-equal">
                                    <a href="{{ route('product_detail', ['product' => $each->id]) }}"
                                        class="text-decoration-none">
                                        <h5 class="product-view-shop">{{ $each->name }}</h5>
                                    </a>
                                    <h6>Price : {{ $each->price }}$</h6>
                                    <h6>Color : {{ $each->color }}</h6>
                                    <h6>Inventory : {{ $each->inventory }}</h6>
                                    <h6>Brand : {{ $each->brand }}</h6>
                                    <div class="d-flex justify-content-between mb-2">
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $each->id }}">
                                            <input type="hidden" name="quantity" id="qty" value="1"
                                                required>
                                            <input type="submit" name="add_to_cart" value="Add to cart"
                                                class="btn btn-primary">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $data->links() }}
            </div>
        </div>
    </div>
@endsection
