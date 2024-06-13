@extends('header')
@push('title')
<title>Edit Product</title>
@endpush

<div class="container">
    <div class="row py-5">
        <div class="col-md-6 border py-3">
            <h4 class="form-label">Edit Product</h4>
<form action="{{url('edit-product/'.$product->id)}}" method="Post" >
@csrf
  <div class="form-group">
    <label>Product Name:</label>
    <input type="text" class="form-control" id="prod_name" placeholder="Enter Product Name" name="prod_name" required
    value="{{$product->name}}">
  </div>
  <div class="form-group">
    <label>Description:</label>
   <textarea class="form-control" name="prod_desc" id="prod_desc" placeholder="Enter Product Description" rows="3" required>{{$product->description}}</textarea>
  </div>
  <div class="form-group">
    <label>Status:</label>
    <select name="status" class="form-control" id="status" required>
        <option>--Select Status--</option>
        <option value="Available" {{ $product->status == 'Available' ? 'selected' : '' }}>Available</option>
        <option value="Not Available" {{ $product->status == 'Not Available' ? 'selected' : '' }}>Not Available</option>
    </select>
  </div>
  <div class="form-group">
    <label>Product Quantity:</label>
    <input type="text" class="form-control" id="prod_quantity" placeholder="Enter Product Quantity" name="prod_quantity" required
    value="{{$product->quantity}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
