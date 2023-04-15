@extends('layouts.app')
@section('content') 
<style>
    label,

select {
    font-size: 18px;
    padding: 1px 5px;
    width:616px;
}

</style>
<body>  
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!DOCTYPE html>
<html>

<body>

<h2 style="margin-left:24px;">Edit Post</h2>
<div class="container">
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('admin.posts.index') }}"> Back</a>
</div>
&nbsp;

{{ Form::model($post, array('route' => array('admin.posts.update', $post->id), 'method' => 'PUT','enctype'=> 'multipart/form-data')) }}

<div class="row" style="margin-left:-63px;">
  <div class="col-md-5">
    <div class="form-group">
        {{ Form::label('title', 'Title:') }}
        {{ Form::text('title', null, array('class' => 'form-control','required')) }}
    </div>
    </div>
    &nbsp;
    <div class="col-md-6">
    <div class="form-group">
        {{ Form::label('description', 'Description:') }}
        {{ Form::text('description', null, array('class' => 'form-control','required')) }}
    
                                           
    </div>
    </div>
    &nbsp;
    <div class="col-md-5">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" id="image" name="image" class="form-control" placeholder="Image" >
                    <img src="{{ asset ('post/'.$post->image) }}" width="100px" height="100px">
                </div>
    </div>
 
</div> 

           <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
{{ Form::close() }}

</div>
</body>
@endsection
