
@extends('layouts.app')

@section('title','trainers')

@section('content')
     <h3><p>Trainer Page : </p></h3> 

    
    
    <div class="row"> 
    <table class="table table-reflow">
        <thead>
            <tr>
              <th>Trainer name</th>
              <th># of Trainees</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach ($trainers as $trainer)
                <tr>
                    <td>{{$trainer->name}}</td>
                    <td>{{$trainer->trainees->count()}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
       



       