@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <a href="/">... All Orders</a>
    </div>
    <div class="form mt-4">
        
        @if (isset($order))
            <h1>Edit Order #{{$order->id}}</h1>
        @else
            <h1>Create Order</h1>     
        @endif
        
        <hr>
        @php
            $action = isset($order) ? "/orders/update/{{ $order->id }}" : "/orders/store";
        @endphp
        <form method="POST" action={{$action}}>
            @csrf <!-- {{ csrf_field() }} -->

            <div class="mb-3">
                <label for="deliver-to" class="form-label">Deliver To</label>
                <input type="text" class="form-control" id="deliver-to" name="deliver_to" value="{{$order->deliver_to ?? ""}}" required>
            </div>
            <div class="mb-3">
                <label for="deliver-to" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="product_category" value="{{$order->product_category ?? ""}}" required>
            </div>
            <div class="mb-3">
                <label for="deliver-to" class="form-label">Quantity</label>
                <input type="text" class="form-control" id="category"  name="product_quantity" value="{{$order->product_quantity ?? ""}}" required>
            </div>
            <div class="mb-3">
                <label for="deliver-to" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="product_brand" value="{{$order->product_brand ?? ""}}" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection