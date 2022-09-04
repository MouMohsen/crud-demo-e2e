@extends('layouts.app')

@section('title', 'CRUD Demo App')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h1>Orders</h1>
                    <div>
                        <a href="/orders/create" class="btn btn-primary m-2"> Add Order</a>
                        <a href="/orders/seed" class="btn btn-warning m-2"> Populate Orders</a>
                    </div>
                </div>
                <table class="table">
                    <caption>Orders Table</caption>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Deliver To</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Brand</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr id="order-{{$order->id}}">
                                <td>{{$order->id}}</td>
                                <td>{{$order->deliver_to}}</td>
                                <td>{{$order->product_category}}</td>
                                <td>{{$order->product_quantity}}</td>
                                <td>{{$order->product_brand}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-success m-1 edit" href="/orders/edit/{{ $order->id }}">Edit</a>
                                        <div class="btn btn-danger m-1 delete" data-id="{{ $order->id }}">Delete</div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.delete').on('click', function () {
            let orderId = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "/orders/delete",
                data: {
                    orderId
                }
            }).then( data => {
                $(`#order-${orderId}`).hide()
            })
        })
    </script>
@endsection