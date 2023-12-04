@extends('admin.admin_master')
@section('admin_content')
    <div class="container-fluid">
        <div class="row flex-nowrap">

            <div class="col py-3 main">


                <div class="container border rounded-1 my-5">
                    @foreach ($data as $item)
                        <table class="table table-responsive">
                            <tr>
                                <th>Created at</th>
                                <th>Order ID</th>
                                <th>User ID</th>
                                <th>Orderer's information</th>
                                <th>Receiver's information</th>
                                <th>Total amount</th>
                                <th>Purchase method</th>
                                <th style="width: 125px">Status</th>
                            </tr>
                            <tr class="align-middle">
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->user_id }}</td>
                                <td>
                                    {{ $item->user->full_name }},
                                    {{ $item->user->phone }},
                                    {{ $item->user->address }}
                                </td>
                                <td>
                                    {{ $item->name_receiver }},
                                    {{ $item->phone_receiver }},
                                    {{ $item->address }}
                                </td>
                                <td>
                                    {{ $item->total_price }}
                                </td>
                                <td>
                                    @switch($item->purchase_method)
                                        @case(1)
                                            Cash
                                        @break

                                        @case(2)
                                            Bank Transfer
                                        @break
                                    @endswitch
                                </td>
                                <td>
                                    @switch($item->status)
                                        @case(0)
                                            Pending
                                            <a class="btn btn-primary"
                                                href="{{ route('list_order.update', ['status' => 1, 'order_id' => $item->id]) }}">Accept</a>
                                            <a class="btn btn-danger " href="{{ route('list_order.update', ['status' => 3, 'order_id' => $item->id]) }}">Deny</a>
                                        @break
                                        @case(1)
                                        Order is being delivered
                                        @break
                                        @case(2)
                                        Received
                                        @break
                                        @case(3)
                                        @break
                                        Order has been cancelled
                                        @default
                                    @endswitch
                                </td>
                            </tr>
                        </table>

                        @foreach ($item->order_item as $product)                            
                        <div class="container">
                            <div class="row py-2">
                                <div class="col-10 col-lg-6 d-flex">
                                    <img src="{{ asset('storage/images/' . $product->product->image) }}" alt="Product Image" style="max-width: 50px;">
                                    <span class="px-2 h6">
                                        {{ $product->product->name }}
                                    </span>
                                </div>
                                <div class="col-2 col-lg-2 ">
                                    <p class="h6">
                                        ${{ $product->product->price }}
                                    </p>
                                </div>
                                <div class="col-6 col-lg-2 ">
                                    <p>Quantity:
                                        {{ $product->quantity }}                                        
                                    </p>
                                </div>
                                <div class="col-6 col-lg-2  text-end">
                                    <p>Total:
                                        ${{ $product->product->price * $product->quantity }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endforeach
                </div>

                </table>

            </div>
        </div>
    </div>
@endsection
