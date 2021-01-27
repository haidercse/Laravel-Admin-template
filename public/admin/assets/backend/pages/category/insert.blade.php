

@extends('backend.layouts.master')

@section('title')
    Dashboard-page
@endsection

@section('admin-content')

  <div class = "container my-2">
    @include('backend.layouts.partials.message')
  
    <div class="card">
        <div class="card-header text-center  ">
           <h3>Add products</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
               
                <div class="form-group">
                    <label for="exampleInputPassword1">Parent Category</label>
                   <select class="form-control" name="parent_id">
                       @foreach ($main_categories as $category)
                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                       @endforeach
                   </select>
                </div>
                 
                <div class="form-group">
                    <label for="exampleInputEmail1">category Image</label>
                    <input type="file" class="form-control" name="category_image" id="exampleInputEmail1">
                </div>
                <button type="submit" class="btn btn-primary">Add category</button>
            </form>
        </div>
    </div>
  </div>

@endsection


