@extends('layouts.app')
@section('content') 
   <h2 style="margin-left:12px;">
    Manage Post
  </h2>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right" style="margin-right:40px;">
        <a class="btn btn-sm fw-bold btn-primary" href="{{ route('admin.posts.create') }}"> Create Post</a>       
       </div>
    </div>
</div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered" style="margin-left:19px;">
        <tr>
            <th class="sorting text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0"><strong>No</strong></th>
            <th class="sorting text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0"><strong>Title</strong></th>
            <th class="sorting text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0"><strong>Description</strong></th>
            <th class="sorting text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0"><strong>Image</strong></th>
            <th class="sorting text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0"width="280px" ><strong style="margin-left:75px;">Action</strong></th>
        </tr>
        @foreach ($posts as $posts1)
        
       
        <tr>
            <td>{{ $posts1->id }}</td>
            <td>{{ $posts1->title }}</td>
            <td>{{ strip_tags($posts1->description) }}</td>
            <td><img src="/post/{{ $posts1->image }}" width="100px" height="100px"></td>
            
            <td>
                <form action="{{ route('admin.posts.destroy',$posts1->id) }}" method="POST" style="margin-left:44px;">
            
                <a class="btn btn-primary" href="{{ route('admin.posts.edit',$posts1->id) }}">Edit</a>
                
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
   

@endsection