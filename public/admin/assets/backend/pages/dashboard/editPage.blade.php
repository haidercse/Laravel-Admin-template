

@extends('backend.layouts.master')

@section('title')
    Dashboard-page
@endsection

@section('admin-content')

  <div class = "container my-2">
    @include('backend.layouts.partials.message')
    @if(Session::has('success'))
    <h3 class="text-success">{{ Session('success') }}</h3>
    @endif
    <div class="card">
        <div class="card-header text-center  ">
           <h3>Add products</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.product.update',$product->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" name="title" id="exampleInputEmail1" value="{{$product->title}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="description" id="exampleInputPassword1" class="form-control" cols="80" rows="10" >{{$product->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="number" class="form-control" name="price" id="exampleInputEmail1" value="{{$product->price}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="number" class="form-control" name="quantity" id="exampleInputEmail1" value="{{$product->quantity}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Image</label>
                    <input type="file" class="form-control" name="product_image" id="exampleInputEmail1">
                </div>
                <button type="submit" class="btn btn-primary">Update product</button>
            </form>
        </div>
    </div>
  </div>

@endsection