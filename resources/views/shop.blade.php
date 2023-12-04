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
                        <li class="breadcrumb-item"><a href="{{ url('./home') }}" class="fs-6">Home</a></li>
                        <li class="breadcrumb-item active fs-6" aria-current="page">Shop</li>
                    </ol>
                </nav>
            </div>
            <div class="col-12 col-lg-8 d-flex align-items-center justify-content-end">
                <div class="select-options d-flex">
                    <div class="page-view-filter justify-content-between">
                        <div class="dropdown select-featured mr-2">
                            <select class="form-select" name="orderby" id="orderby">
                                <option value="-1" {{ $order == -1 ? 'selected' : '' }}>Default</option>
                                <option value="1" {{ $order == 1 ? 'selected' : '' }}>Date, New To Old</option>
                                <option value="2" {{ $order == 2 ? 'selected' : '' }}>Date, Old To New</option>
                                <option value="3" {{ $order == 3 ? 'selected' : '' }}>Price, Low To High</option>
                                <option value="4" {{ $order == 4 ? 'selected' : '' }}>Price, High To Low</option>
                            </select>
                        </div>
                    </div>
                    <div class="dropdown select-featured justify-content-between">
                        <select class="form-select" name="size" id="pagesize">
                            <option value="9" {{ $size == 9 ? 'selected' : '' }}>9 Products Per Page</option>
                            <option value="18" {{ $size == 18 ? 'selected' : '' }}>18 Products Per Page</option>
                            <option value="27" {{ $size == 27 ? 'selected' : '' }}>27 Products Per Page</option>
                            <option value="50" {{ $size == 50 ? 'selected' : '' }}>50 Products Per Page</option>
                        </select>
                    </div>
                </div>
                <form class="d-none d-lg-flex ms-auto">
                    <input type="search" class="form-control rounded" name="q" value="{{ $search }}"
                        placeholder="Search">
                    <button class="btn btn-outline-primary" type="button">Search</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Heading -->

    <!-- Main content -->
    <div class="container py-3">
        <div class="row">
            <div class="d-none col-lg-3 d-lg-block border rounded-1 p-3 filter_offcanvas">
                <h2>Filter By</h2>
                {{-- Color --}}
                <div class="accordion-item category-color">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree">
                            Color
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul class="category-list">
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fas fa-check"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fas fa-check"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fas fa-check"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fas fa-check"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fas fa-check"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fas fa-check"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fas fa-check"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fas fa-check"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fas fa-check"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Price --}}
                <div class="accordion-item category-price">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour">Price</button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="range-slider category-list">
                                <input type="text" class="js-range-slider" id="js-range-price" value="" />
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Category --}}
                <div class="accordion-item category-rating">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSix">
                            Category
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                        <div class="accordion-body category-scroll">
                            <ul class="category-list">

                                <li>
                                    <div class="form-check ps-0 custome-form-check">
                                        <input class="checkbox_animated check-it" id="ct1" name="categories"
                                            type="checkbox" value="1">
                                        <label class="form-check-label">Qui Ut</label>
                                        <p class="font-light">(7)</p>
                                    </div>
                                </li>

                                <li>
                                    <div class="form-check ps-0 custome-form-check">
                                        <input class="checkbox_animated check-it" id="ct2" name="categories"
                                            type="checkbox" value="2">
                                        <label class="form-check-label">Blanditiis Error</label>
                                        <p class="font-light">(8)</p>
                                    </div>
                                </li>

                                <li>
                                    <div class="form-check ps-0 custome-form-check">
                                        <input class="checkbox_animated check-it" id="ct3" name="categories"
                                            type="checkbox" value="3">
                                        <label class="form-check-label">Quam Quos</label>
                                        <p class="font-light">(0)</p>
                                    </div>
                                </li>

                                <li>
                                    <div class="form-check ps-0 custome-form-check">
                                        <input class="checkbox_animated check-it" id="ct4" name="categories"
                                            type="checkbox" value="4">
                                        <label class="form-check-label">Cupiditate Minus</label>
                                        <p class="font-light">(5)</p>
                                    </div>
                                </li>

                                <li>
                                    <div class="form-check ps-0 custome-form-check">
                                        <input class="checkbox_animated check-it" id="ct5" name="categories"
                                            type="checkbox" value="5">
                                        <label class="form-check-label">Dolores Et</label>
                                        <p class="font-light">(4)</p>
                                    </div>
                                </li>

                                <li>
                                    <div class="form-check ps-0 custome-form-check">
                                        <input class="checkbox_animated check-it" id="ct6" name="categories"
                                            type="checkbox" value="6">
                                        <label class="form-check-label">Quis Repudiandae</label>
                                        <p class="font-light">(0)</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

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
                {{ $data->withQueryString()->links() }}
            </div>
        </div>
    </div>
    <form id="frmFilter" method="GET">
        <input type="hidden" name="page" id="page" value="{{ $page }}">
        <input type="hidden" name="size" id="size" value="{{ $size }}">
        <input type="hidden" name="order" id="order" value="{{ $order }}">
        <input type="hidden" name="prange" id="prange" value="">
    </form>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#pagesize').on('change', function() {
                $('#size').val($('#pagesize option:selected').val());
                $('#page').val($('#pagesize option:selected').val());
                $('#frmFilter').submit();
            });

            $('#orderby').on('change', function() {
                $('#order').val($('#orderby option:selected').val());
                $('#frmFilter').submit();
            });

            var $range = $(".js-range-slider");
            instance = $range.data("ionRangeSlider");
            instance.update({
                from: {{ $from }},
                to: {{ $to }},
                step: 1
            });

            $('#prange').on('change', function() {
                setTimeout(() => {
                    $('#frmFilter').submit();
                }, 1000);
            });
        });
    </script>
@endpush
