@extends('layouts.app')
@extends('header')
@push('title')
<title>Product</title>
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12"> 
            <div class="py-5">
            <div class="float-right py-3 ">
              <a href="{{url('/add-product')}}">  <button class="btn btn-primary">Add</button></a>
            </div>
            <table class="table table-bordered">
            <thead>
            <tr>
            <th >#</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Quantity</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
        
           @foreach($products as $product)
            <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td> {{ Str::limit($product->description, 150) }}</td>
            <td>{{$product->status}}</td>
            <td>{{$product->quantity}}</td>
            <td>
            <a href="{{url('/edit-product/'.$product->id)}}"><i class="fa fa-pencil text-dark"></i></a>
            <span class="text-dark mr-auto ml-auto">|</span>
            <a href="{{url('/view-product/'.$product->id)}}"><i class="fa fa-eye text-dark"></i></a>
            <span class="text-dark mr-auto ml-auto">|</span>
            <a href="{{url('/delete/'.$product->id)}}"><i class="fa fa-trash text-dark"></i></a>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
            </div>
    </div>
 </div>
</div>
@endsection
