@extends('layouts.app')

@section('content')
 

            
             
<div class="container">
    <div class="row">
     <table class="table">
      <tr>
       <th>Locker Type</th>
       <th>Locker Number</th>
       <th>Coach Number</th>
       <th>Delete</th>
      </tr>
      @foreach ($lockers as $locker)
      <tr>
       <td>{{ $locker->type }}</td>
       <td>{{ $locker->number }}</td>
       <td>{{ $locker->trainer_id }}</td>
       <td>
        <form action="{{ url('lockers/' . $locker->id ) }}" method="post">
         {{ method_field('delete') }}
         {{ csrf_field() }}
         <input type="submit" name="Delete" value="Delete" class="btn btn-danger" onClick = 'return confirm("Are you sure you want to delete this Locker")'>
        </form>
       </td>
      </tr>
      @endforeach
     </table>
    </div>
    </div>
               


  
@endsection

