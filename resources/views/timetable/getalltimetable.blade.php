@extends('layout.masterlayout')
@extends('layout.header')
@section('title')
    Admin Dashboard
@endsection
@if(Session::has('msg'))
        <div id="msg" class="from-group alert alert-success">{{Session::get('msg')}}</div>
    @endif
@section('content')
    <div class="container mt-3">
        <h2>All Time Table</h2> 
        <table class="table table-bordered">
            <thead>
            <tr>
              <th>#</th>
              <th>Admin ID</th>
              <th>Teacher ID</th>
              <th>Subject ID</th>
              <th>Batch ID</th>
              <th>Room No.</th>
              <th>Date</th>
              <th>Lacture Time</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($timetables as $timetable )
            <tr>
                <td>{{$timetable->id}}</td>
                <td>{{$timetable->admin_id}}</td>
                <td>{{$timetable->teacher_id}}</td>
                <td>{{$timetable->subject_id}}</td>
                <td>{{$timetable->batch_id}}</td>
                <td>{{$timetable->room_number}}</td>
                <td>{{$timetable->date}}</td>
                <td>{{$timetable->start_time}} : {{$timetable->end_time}}</td>
                @if ($timetable->status=="0")
                <td> <span class="bg-warning rounded text-light p-1">Watting</span></td>
                @elseif ($timetable->status=="1")
                <td> <span class="bg-success rounded text-light p-1">Active</span></td>
                @else
                <td> <span class="bg-danger rounded text-light p-1">blocked</span></td>
                @endif
                <td>
                    <a href="" class="btn btn-success rounded text-light p-1">Edit</a>
                    <a href="" class="btn btn-danger rounded text-light p-1">Delete</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center"><p class="text-danger">Data not available</p></td>
            </tr>
            @endforelse 
            </tbody>
        </table>
    </div>
@endsection
@section('footer')
<div class="container-fluid bg-info">
    <p class="text-center p-3">2024&copy;Copyright</p>
</div>
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    $(document).ready(function(){
        setTimeout(function() { 
          $('#msg').hide();
        }, 2000);
    });
</script>
    
@endpush
