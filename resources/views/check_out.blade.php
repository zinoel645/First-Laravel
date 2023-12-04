@extends('layout.master')
@section('content')
    <div class="py-5 text-center">
        <h2>Check Out</h2>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>Shipping Information</h3>
                <form action="{{ route('process_checkout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ Auth::id() }}">
                    <div class="form-group">
                        <label for="name_receiver">Name</label>
                        <input type="text" class="form-control" name="name_receiver" value="{{ Auth::user()->full_name }}">
                    </div>
                    <div class="form-group">
                        <label for="phone_receiver">Phone</label>
                        <input type="text" class="form-control" name="phone_receiver" value="{{ Auth::user()->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="address_receiver">Address</label>
                        <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}">
                    </div>

            </div>
            <div class="col-md-6">
                <h3>Order Summary</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                                <td class="align-middle text-center">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('storage/images/' . $item->model->image) }}"
                                                alt="{{ $item->model->name }}" style="max-width: 50px;">
                                        </div>
                                        <div class="col-10">
                                            <div class="mt-2">{{ $item->model->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    ${{ $item->price }}
                                </td>
                                <td class="align-middle text-center">
                                    {{ $item->qty }}
                                </td>
                                <td class="align-middle text-center">
                                    ${{ $item->subtotal() }}
                                </td>
                                <input type="hidden" name="quantities[]" value="{{ $item->qty }}">
                                <input type="hidden" name="product_ids[]" value="{{ $item->model->id }}">
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h3 class="float-right">Total Amount:
                    ${{ Cart::instance('cart')->subtotal() }}
                </h3>
                <input type="hidden" name="total_price" value="{{ Cart::instance('cart')->subtotal() }}">
            </div>
        </div>
        <div class="float-right">Purchase method:
            <input type="radio" name="purchase_method" value="1" checked> Cash
            <input type="radio" name="purchase_method" value="2"> Bank Transfer
        </div>
        <div class="row mt-4">
            <div class="row mt-4">
                <div class="col-6">
                    <a href="views_cart.php" class="btn btn-primary">Back to Cart</a>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary float-right">Check Out</button>
                </div>
            </div>
            </form>
        </div>
        <div class="mt-4"></div>
    </div>
@endsection
