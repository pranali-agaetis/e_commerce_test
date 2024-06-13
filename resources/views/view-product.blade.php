@extends('header')
@push('title')
<title>View Product</title>
@endpush

<div class="container">
    <div class="row py-5">
        <div class="col-md-8 border py-3">
            <h4>{{$product->name}}</h4>
            <p>Status :{{$product->status}}</p>
            <p>Quantity :{{$product->quantity}}</p>
            <p>{{$product->description}}</p>

        </div>
    </div>
</div>