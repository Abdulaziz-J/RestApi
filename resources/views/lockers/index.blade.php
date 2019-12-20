@extends('layouts.app')

@section('content')




    <div class="container">
        <div class="row justify-content-center">

            <div class="row">
                <table class="table table-striped" id="lockers">
                    <thead>
                    <tr>
                        <th>Locker Type</th>
                        <th>Locker Number</th>
                        <th>Coach Number</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($lockers as $locker)
                        <tr>
                            <td>{{ $locker->type }}</td>
                            <td>{{ $locker->number }}</td>
                            <td>{{ $locker->trainer_id }}</td>
                            <td>
                                <form action="{{ url('lockers/' . $locker->id ) }}" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <input type="submit" name="Delete" value="Delete" class="btn btn-danger"
                                           onClick='return confirm("Are you sure you want to delete this Locker")'>
                                </form>
                            </td>
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
            $('#lockers').DataTable({
                "paging": true

            });
            $('.dataTables_length').addClass('bs-select');

        });

    </script>
@endsection
