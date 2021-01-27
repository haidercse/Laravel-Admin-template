@extends('backend.layouts.master')

@section('title')
    Edit page
@endsection

@section('admin-content')
    <div class = "container  my-2">
        @include('backend.layouts.partials.message')
        <div class="card">
            <div class="card-header">
               <h3>Category Title</h3>
            </div>

            <div class="card-body">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Parent Category</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                   @if ($category->parent_id == null)
                                     primary category
                                   @else    
                                   {{$category->parent->name}}
                                   @endif 
                                </td>
                                
                                <td>
                                    <a href="{{ route('admin.category.editpage',$category->id) }}" class = "btn btn-primary" style="margin-right:5px;">Edit</a>
                                    <a href="#deleteModal{{$category->id}}" data-toggle="modal"  class="btn btn-danger">Delete</a>

                                    <!--Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title  text-dark" id="exampleModalLabel">Are you sure to delete? </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.category.delete',$category->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger" style="margin-left:0px!important;" >Permanent Delete</button>
                                            </form>
                                            
                                        </div>
                                        <div class="modal-footer">
                                           
                                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        </div>
                                        </div>
                                    </div>
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

