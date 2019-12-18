@extends('layouts.app')

@section('title', 'Comment Page ')

@section('content')
    <h2>Edit Comment</h2>
    <form action="/comments/update/{{$comment->id}}" method="post" enctype="multipart/form-data">
     
      {{csrf_field()}}
      <div class="form-group">
        <label for="formGroupExampleInput2">Comment</label>
        <textarea name="content" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Comment input">{{$comment->content}}</textarea>
        
        <input type="file" name="image" value="{{$comment->iamge_name}}"/>
      </div>
    
    {{-- Name: <input type="text" name="name"  id="name"><br>
    Description: <textarea name="description" id="description"></textarea><br> --}}
    <input type="submit"  class="btn btn-success" value="Update Comment">
  </form>
@endsection


@if (session('message'))
    <p><b>{{ session('message') }}</b></p>
 @endif 
