@extends('layout.master')
@section('content')
    <h1 class="text-center">Product Detail</h1>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 py-2 text-center">
                <img src="{{ asset('storage/images/' . $each->image) }}" alt="" width="300" height="300">
            </div>
            <div class="col-12 col-lg-6 py-2 border-primary rounded-2">
                <div class="d-flex justify-content-between">
                    <h4 class="product-heading">{{ $each->name }}</h4>
                    <a href="sosanh.php?sp1=" class="compare-button justify-content-end">
                        <i class="fa-solid fa-plus"></i> Compare</a>
                </div>
                <div class="row py-3">
                    <div class="col-4">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{ asset('storage/homepage/color-pallet.svg') }}" alt="" sizes="25x25"
                                    srcset="" width="25px" height="25px">
                            </div>
                            <div class="col-9">
                                <h6>Color</h6>
                                <p>{{ $each->color }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{ asset('storage/homepage/tiles.svg') }}" alt="" sizes="25x25" srcset=""
                                    width="25px" height="25px">
                            </div>
                            <div class="col-9">
                                <h6>Brand</h6>
                                <p>{{ $each->brand }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{ asset('storage/homepage/tiles.svg') }}" alt="" sizes="25x25" srcset=""
                                    width="25px" height="25px">
                            </div>
                            <div class="col-9">
                                <h6>Categories</h6>
                                <p>
                                    @foreach ($datas as $cate)
                                    {{ $cate->cate_name }},    
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="../core/model/add_to_cart.php?product_id=&from_product_detail" method="POST">
                    <label for="quantity">Quantity : </label>
                    <input type="number" name="quantity" value="1" required>
                    <span>Available: <span class="fw-bold">

                        </span><span>
                            <br>
                            <input type="submit" name="add_to_cart" value="Add to cart" class="btn btn-primary my-3">
                </form>
                <a href="#"><button class="btn btn-secondary">Download Word File</button></a>
            </div>
            <div class="col-12 py-5">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Description</a>
                    </li>
                </ul>
                <p class="py-3">

                </p>
            </div>
        </div>
    </div>
@endsection
