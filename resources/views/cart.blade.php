@extends('layout.master')

@section('content')
    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif --}}
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h2>Shopping Cart</h2>
                @if ($cartItems->count() > 0)
                    There are {{ $cartItems->count() }} products in your cart.
                    <br><br>
                @else
                    <p>Your cart is empty!</p>
                @endif
            </div>
        </div>
        @if ($cartItems->count() > 0)
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="align-middle text-center" scope="col">Image</th>
                                <th class="align-middle text-center" scope="col">Product Name</th>
                                <th class="align-middle text-center" scope="col">Price</th>
                                <th class="align-middle text-center" scope="col">Quantity</th>
                                <th class="align-middle text-center" scope="col">Total</th>
                                <th class="align-middle text-center" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td class="align-middle text-center"><img
                                            src="{{ asset('storage/images/' . $item->model->image) }}"
                                            alt="{{ $item->model->name }}" style="max-width: 100px;"></td>
                                    <td class="align-middle text-center">{{ $item->model->name }}</td>
                                    <td class="align-middle text-center">${{ $item->price }}</td>
                                    <td class="align-middle text-center" style="width: 5%;">
                                        <input type="number" class="form-control" name="quantity"
                                            onchange="updateQuantity(this)" data-rowid="{{ $item->rowId }}"
                                            value="{{ $item->qty }}">
                                    </td>
                                    <td class="align-middle text-center">${{ $item->subtotal() }}</td>
                                    <td class="align-middle text-center text-center"><a href="javascript:void(0)"
                                            onclick="removeItemFromCart('{{ $item->rowId }}')" class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i> Remove
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a class="float-right btn btn-danger btn-sm" href="javascript:void(0)" onclick="clearCart()">
                        <i class="fa-solid fa-trash-can"></i> Clear cart
                    </a>
                    <h3 class="float-right mr-2">
                        Total amount:
                        ${{ Cart::instance('cart')->subtotal() }}
                    </h3>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-6">
                <a href="{{ route('shop.index') }}" class="btn btn-primary">Back to Shop</a>
            </div>
            <div class="col-6 ">
                <a href="{{ route('cart.checkout') }}" class="btn btn-primary float-right">Buy now</a>
            </div>
        </div>
    </div>
    <div class="mt-4"></div>
    <form id="updateCartQty" action="{{ route('cart.update') }}" method="POST">
        @csrf
        @method('put')
        <input type="hidden" id="rowId" name="rowId">
        <input type="hidden" id="quantity" name="quantity">
    </form>

    <form id="clearCart" action="{{ route('cart.clear') }}" method="POST">
        @csrf
        @method('delete')
    </form>
@endsection
@push('scripts')
    <script>
        function updateQuantity(qty) {
            $('#rowId').val($(qty).data('rowid'));
            $('#quantity').val($(qty).val());
            $('#updateCartQty').submit();
        }

        function clearCart() {
            $('#clearCart').submit();
        }
    </script>
@endpush
