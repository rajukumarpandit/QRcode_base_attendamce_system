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
        <h2>All Subject</h2> 
        <table class="table table-bordered">
            <thead>
            <tr>
              <th>#</th>
              <th>Branch ID</th>
              <th>Subject Code</th>
              <th>Subject Name</th>
              <th>Created Date</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($subjects as $subject )
            <tr>
                <td>{{$subject->id}}</td>
                <td>{{$subject->branch_id}}</td>
                <td>{{$subject->subject_code}}</td>
                <td>{{$subject->subject_name}}</td>
                <td>{{$subject->created_at}}</td>
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
