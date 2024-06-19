@extends('layouts.app')
@extends('header')
@push('title')
<title>View Product</title>
@endpush
@section('content')
<div class="container">
    <div class="row py-5">
       <!-- @foreach ($bread as $key => $value)
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @if (url()->current() === $value)
                        <li class="breadcrumb-item" aria-current="page">{{$key}}</li>
                    @else
                        <li class="breadcrumb-item active" aria-current="page"><a href={{$value}}>{{$key}}</a></li>
                    @endif
                </ol>
          </nav>
        @endforeach-->
        <div class="col-md-8 border py-3">
            <h4>{{$product->name}}</h4>
            <p>Status :{{$product->status}}</p>
            <p>Quantity :{{$product->quantity}}</p>
            <p>{{$product->description}}</p>

        </div>
    </div>
</div>
@endsection