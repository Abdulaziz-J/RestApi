@extends('layouts.app')

@section('content')

    <div class="row">
        <marquee behaviour="scroll" direction="left">
        {{$quote->quote . '-' . $quote->author}}

        </marquee>
    </div>

  <div class="container">
      <h4>Lesson tables is designed for aspiring athletes with a broad and yet focused set of sports</h4>
      
      <div class="row">
       <table id="lessonsTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
        <tr>
         <th>Sport Name</th>

         <th>Thumbnail</th>
         <th>Number of Trainees</th>
         <th>Description</th>
         <th>Days</th>
         <th>Data</th>
         @if (auth()->user()->type == 'trainer')
            <th>Action</th>
         @endif
         @if (auth()->user()->type == 'trainee')
         <th>Enrollemnt</th>
      @endif

        </tr>
        </thead>
       <tbody>
        @foreach ($lessons as $lesson)
        <tr>
         <td>{{ $lesson->name }}</td>
         <td><img src="/images/{{$lesson->image}}" alt="img" style="width:70px"/></td>
        <td>{{$lesson->trainees()->count()}}</td>
         <td>{{ $lesson->description }}</td>
         <td>{{ $lesson->day }}</td>
         <td>{{ $lesson->date }}</td>
         <td>
            @if (auth()->user()->type == 'trainer')
                <a href="/lessons/{{ $lesson->id}}" class="btn btn-primary">Edit</a>
            @endif

            <?php
            $isEnrolled = $lesson->trainees->contains(auth()->user()->id);


            $isEnrolledClass = $isEnrolled? "btn-danger": "btn-success";
            $isEnrolledText = $isEnrolled? "Unenroll": "Enroll";
            $routeName = $isEnrolled? "/lessons/unenroll/{$lesson->id}": "/lessons/enroll/{$lesson->id}";
            ?>

            @if (auth()->user()->type == 'trainee')
         <a href="{{$routeName}}" class="btn <?php echo $isEnrolledClass;?>" >{{$isEnrolledText}}</a>
            @endif

        


            <a href="/lessons/{{ $lesson->id}}/comments" class="btn btn-success">Comments</a>
         </td>
        </tr>
        @endforeach
       </tbody>
       </table>
      </div>
  </div>

@endsection

@section('javascript')
<script>
    $(document).ready(function () {
        $('#lessonsTable').DataTable({
            "paging": true
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>
@endsection
<style>#lessonsTable{ min-width: 1000px; }</style>
  
  
