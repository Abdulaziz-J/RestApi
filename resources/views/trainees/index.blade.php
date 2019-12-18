@extends('layouts.app')

@section('content')
 

            
             
<div class="container">
    <div class="row">
     <table class="table">
      <tr>
       <th>Trainee Name</th>
       <th>Title</th>
       <th>Type of Trainee</th>
       <th>Email</th>
       <th>Trainee Number</th>
       <th>Coach Number</th>
       <th>Delete</th>
      </tr>
      @foreach ($trainees as $trainee)
      <tr>
       <td>{{ $trainee->name }}</td>
       <td>{{ $trainee->title }}</td>
       <td>{{ $trainee->type }}</td>
       <td>{{ $trainee->email }}</td>
       <td>{{ $trainee->number }}</td>
       <td>{{ $trainee->trainer_id }}</td>
       <td>
        <form action="{{ url('trainees/' . $trainee->id ) }}" method="post">
         {{ method_field('delete') }}
         {{ csrf_field() }}
         <input type="submit" name="Delete" value="Delete" class="btn btn-danger" onClick = 'return confirm("Are you sure you want to delete this Trainee")'>
        </form>
       </td>
      </tr>
      @endforeach
     </table>
    </div>
    </div>
               


  
@endsection

