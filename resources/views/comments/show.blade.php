@extends('layouts.app')

@section('title', 'Comment Details')

@section('content')

  <h1>Edit Comment</h1>
  <form method="POST" action="{{ route('comments.update') }}" enctype="multipart/form-data">
      @csrf
       <p>Name: <input type="text" name="name"  value=" {{ $comments->name }}"></p>
       <p>Description: <textarea name="description" >{{ $comments->description }}</textarea></p>   
       <input type="file" name="fileUploadElement" value=""><br><br>
       <input type="hidden" name="id" value="{{ $comments->id }}"><b>
       <input type="submit" value="Edit"><b>
      
  
  </form>

  @if(isset($files) && !empty($files))
  <div id="commentImages">
    @foreach($files as $curFile)
        <img src="{{env('APP_URL')}}/uploads/{{$curFile}}">
    @endforeach

  </div>
  @endif
@endsection



 