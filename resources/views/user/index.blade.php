@extends('layout.master')
@section('content')
    @if (session('done-checkout'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('done-checkout') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container border rounded-1 my-5">
        @foreach ($data as $order)
            <table class="table table-responsive">
                <tr>
                    <th>Created at</th>
                    <th>Orderer's information</th>
                    <th>Receiver's information</th>
                    <th>Total amount</th>
                    <th>Purchase method</th>
                    <th style="width: 125px">Status</th>
                </tr>
                <tr class="align-middle">
                    <td>{{ $order->created_at }}</td>
                    <td>
                        {{ Auth::user()->full_name }}
                        {{ Auth::user()->phone }}
                        {{ Auth::user()->address }}
                    </td>
                    <td>
                        {{ $order->name_receiver }}
                        {{ $order->phone_receiver }}
                        {{ $order->address }}
                    </td>
                    <td>
                        {{ $order->total_price }}
                    </td>
                    <td>
                        @switch($order->purchase_method)
                            @case(1)
                                Cash
                            @break

                            @case(2)
                                Bank Transfer
                            @break
                        @endswitch
                    </td>
                    <td>
                        @switch($order->status)
                            @case(0)
                                Pending
                            @break

                            @case(1)
                                Order is being delivered
                                <a class="btn btn-primary"
                                    href="{{ route('user_order.update', ['status' => 2, 'order_id' => $order->id]) }}">Received</a>
                            @break

                            @case(2)
                                Received
                            @break

                            @case(3)
                                Order has been cancelled
                            @break
                        @endswitch
                    </td>
                </tr>
            </table>
            @foreach ($order->order_item as $orderItem)
                <div class="container ms-3">
                    <div class="row py-2">
                        <div class="col-10 col-lg-3 d-flex">
                            <img src="{{ asset('storage/images/' . $orderItem->product->image) }}" alt="Product Image"
                                style="max-width: 50px;">
                            <span class="px-2 h6">
                                {{ $orderItem->product->name }}
                            </span>
                        </div>
                        <div class="col-2 col-lg-1 ">
                            <p class="h6">
                                {{ $orderItem->product->price }}
                            </p>
                        </div>
                        <div class="col-6 col-lg-1 ">
                            <p>Quantity:
                                {{ $orderItem->quantity }}
                            </p>
                        </div>
                        <div class="col-6 col-lg-1  text-end">
                            <p>Total:
                                {{ $orderItem->product->price * $orderItem->quantity }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
@endsection
