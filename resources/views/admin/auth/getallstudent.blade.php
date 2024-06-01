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
        <h2>All Student</h2> 
        <table class="table table-bordered">
            <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Admission Number</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Branch</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($students as $student )
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->admission_number}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->mobile_number}}</td>
                <td>{{$student->batch_id}}</td>
                <td> <span class="btn btn-success p-1">Active</span></td>
                <td>
                    <a href="" class="btn btn-success p-1">Edit</a>
                    <a href="" class="btn btn-danger p-1">Delete</a>
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
