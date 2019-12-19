@extends('layouts.app')

@section('title','trainers')

@section('content')
    <div class="container">
        <h3><p>Trainer Page : </p></h3>

        <div class="row justify-content-center">
        <div class="row">
            <table class="table table-reflow table-striped" id="trainers">
                <thead>
                <tr>
                    <th>Trainer name</th>
                    <th>Number of Trainees</th>

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
        </div>
    </div>
@endsection


@section('javascript')
    <script>
        $(document).ready(function () {
            $('#trainers').DataTable({
                "paging": true
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endsection
