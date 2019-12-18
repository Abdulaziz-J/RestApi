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

@section('title', 'Lesson Details')

@section('content')
 
 <div class="container">
    <div class="row">
       <div class="col-md-4">
		     <div class="form_main">
                <h4 class="heading"><strong> Edit </strong> Lessons <span></span></h4>
              <div class="form">
              <form enctype="multipart/form-data" action="/lessons/update" method="post" id="contactFrm" name="contactFrm">
                    <input type="text" required="" placeholder="Please input your Name" value=" {{ $lessons->name }}" name="name" class="txt">
                    <input type="text" required="" placeholder="Please input your Description" value="{{ $lessons->description }}" name="description" class="txt">
                    <input type="text" required="" placeholder="Please input your Day" value="{{ $lessons->day }}" name="day" class="txt">
                    Date: <input type="date" name="date" value="{{ date('Y-m-d', strtotime($lessons->date)) }}">
                    <input type="hidden" name="id" value="{{ $lessons->id }}">
                     <input type="file"  name="image" >
                     
                     <input type="submit" value="submit" name="submit" class="btn btn-success txt2">
                     <a class='btn btn-warning txt2' href="{{ route('lessons.index') }}">Cancel</a>
                     <a class='btn btn-primary txt2' href="{{ route('lessons.index') }}">Back</a>

                    {{csrf_field()}}
                </form>
            <form method="post" action="/lessons/{{$lessons->id}}">
                    {{csrf_field()}}
                    @method('delete')
                    <input class="btn btn-danger" type="submit" value="Delete">
                 </form> 

               </div>
           </div>
         </div>
     </div>
   </div>

    
    
@endsection
