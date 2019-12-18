@extends('layouts.app')

<style>
form_main {
    width: 100%;
}
.form_main h4 {
    font-family: roboto;
    font-size: 20px;
    font-weight: 300;
    margin-bottom: 15px;
    margin-top: 20px;
    text-transform: uppercase;
}
.heading {
    border-bottom: 1px solid #fcab0e;
    padding-bottom: 9px;
    position: relative;
}
.heading span {
    background: #9e6600 none repeat scroll 0 0;
    bottom: -2px;
    height: 3px;
    left: 0;
    position: absolute;
    width: 75px;
}   
.form {
    border-radius: 7px;
    padding: 6px;
}
.txt[type="text"] {
    border: 1px solid #ccc;
    margin: 10px 0;
    padding: 10px 0 10px 5px;
    width: 100%;
}
.txt_3[type="text"] {
    margin: 10px 0 0;
    padding: 10px 0 10px 5px;
    width: 100%;
}
.txt2[type="submit"] {
    background: #242424 none repeat scroll 0 0;
    border: 1px solid #4f5c04;
    border-radius: 25px;
    color: #fff;
    font-size: 16px;
    font-style: normal;
    line-height: 35px;
    margin: 10px 0;
    padding: 0;
    text-transform: uppercase;
    width: 30%;
}
.txt2:hover {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    color: #5793ef;
    transition: all 0.5s ease 0s;
}

  </style>
@section('title', 'Comment Page ')

@section('content')
  
<div class="container">


  <div class="">
   
  <h1>Lesson: {{$lesson->name}}</h1>
  <div  id="commentsList" class="row">

    
    <ul>
    @foreach ($comments as $comment)
      <li class="mt-2 mb-2">
       
        @if($comment->iamge_name)
        <img src="/images/{{$comment->iamge_name}}" alt="" style="width:250px" alt="comment-image" class="img mb-2 mt-2">
        @endif
        <br>
        <strong>By {{$comment->user->name}}</strong> : {{$comment->content}}
        <br>


        @if(auth()->user()->id == $comment->user_id || auth()->user()->type=='trainer')
          <a href="/comments/delete/{{$comment->id}}" class="btn btn-danger">Delete</a>
          <a href="/comments/edit/{{$comment->id}}" class="btn btn-success">Edit</a>
        
          @endif
      </li>
    
    @endforeach
    </ul>
    
  </div>
	<div class="row">
    <div class="col-md-4">
		<div class="form_main">
                <h4 class="heading"><strong>Add </strong> Comment <span></span></h4>
                <div class="form">
                <form action="/comments/create/{{$lesson->id}}" method="post" enctype="multipart/form-data" id="comment_form" name="contactFrm">
                 
                    <input type="hidden" value="{{csrf_token()}}" id="token" name="_token">
                   
                    <textarea id="content" placeholder="Your Message" name="content" type="text" class="txt_3"></textarea>
                   <input type="file" name="image" class="mt-2 mb-2" />
                   
                   <input type="submit" value="Create Comment" name="submit" class="btm btn-success">
                </form>
            </div>
    </div>
</div>
@endsection


@if (session('message'))
    <p><b>{{ session('message') }}</b></p>
 @endif 

@section('javascript')
    <script>
   
   $(document).ready(function(){

        console.log('Page loaded');
        $('#comment_form').on('submit', function(e){

            e.preventDefault();
            var route = "/comments/create/{{$lesson->id}}";
            
            var content = $('#content').val();
            var token = $('#token').val();

            $.ajax({
                type: 'POST',
                url: route,
                data: new FormData(this),
                processData:false,
                cache:false,
                contentType:false,
                dataType: 'JSON',
                success: function(data){
                   alert(data.data);
                }
            });

        });

   });

    </script>
@endsection