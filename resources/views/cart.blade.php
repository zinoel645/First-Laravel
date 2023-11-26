@extends('layout.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h2>Shopping Cart</h2>
                @if ($cartItems->Count() > 0)
                    There are in your cart
                @else
                    <p>Your cart is empty!</p>
                @endif
            </div>
        </div>
        @if ($cartItems->Count() > 0)
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td><img src="{{ asset('assets/images/' . $item->model->image) }}"
                                            alt="{{ $item->model->name }}" style="max-width: 100px;"></td>
                                    <td>{{ $item->model->name }}</td>
                                    <td>${{ $item->price }}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-primary">-</a>
                                        {{ $item->qty }}
                                        <button class="btn btn-sm btn-primary upd-qty" data-id="{{ $item->model->id }}" data-action="plus">+</button>
                                    </td>
                                    <td>${{ $item->subtotal() }}</td>
                                    <td>
                                        <button class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i> Remove
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h3 class="float-right">
                        Total amount:
                        ${{ Cart::instance('cart')->total() }}

                    </h3>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-6">
                <a href="{{ route('shop') }}" class="btn btn-primary">Back to Shop</a>
            </div>
            <div class="col-6 ">
                <a href="check_out.php" class="btn btn-primary float-right">Buy now</a>
            </div>
        </div>
    </div>
    <div class="mt-4"></div>
    <script>
        document.querySelectorAll('.upd-qty').forEach(item => item.addEventListener('click', function(event) {
            event.preventDefault();

            const id = event.target.dataset.id;
            const action = event.target.dataset.action;

            fetch(`/api/cart`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    // Add any additional headers as needed (e.g., authentication token)
                },
                body: JSON.stringify({ id: id, action: action }),
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log(data.message);
                // Handle success (e.g., update UI)
            })
            .catch(error => {
                console.error('Error updating cart item:', error);
                // Handle error
            });
        }));
    </script>
@endsection
