@extends('layout.masterlayout')
@extends('layout.header')
@section('title')
    Admin Dashboard
@endsection
@if(Session::has('msg'))
        <div id="msg" class="from-group alert alert-success">{{Session::get('msg')}}</div>
    @endif
@section('content')
    <div class="row justify-content-between mb-4"> 
        <div class="col-md-4 card text-center border-primary mt-3 p-4" style="max-width: 19rem;">
            <div class="card-body">
                <h5 class="card-title p-3"></h5>
                <div class="row">
                  <p>Total Teacher</p>
                  <h1>{{$teachers}}</h1>
                  <div class="col-12">
                      <a href="{{route('admin.teacher')}}" class="btn btn-warning">view</a>
                  </div>
                </div>    
            </div>
        </div>
        <div class="card text-center border-primary mt-3 p-4" style="max-width: 19rem;">
            <div class="card-body">
                <h5 class="card-title p-3"></h5>
                <div class="row">
                  <p>Total Student</p>
                  <h1>{{$students}}</h1>
                  <div class="col-12">
                      <a href="{{route('admin.student')}}" class="btn btn-warning">view</a>
                  </div>
                </div>    
            </div>
        </div>
        <div class="card text-center border-primary mt-3 p-4" style="max-width: 19rem;">
            <div class="card-body">
                <h5 class="card-title p-3"></h5>
                <div class="row">
                  <p>Total Time table</p>
                  <h1>{{$timetables}}</h1>
                  <div class="col-12">
                      <a href="{{route('admin.viewtimetable')}}" class="btn btn-warning">view</a>
                  </div>
                </div>    
            </div>
        </div>
        <div class="card text-center border-primary mt-3 p-4" style="max-width: 19rem;">
            <div class="card-body">
                <h5 class="card-title p-3"></h5>
                <div class="row">
                  <p>Total Batch</p>
                  <h1>{{$batches}}</h1>
                  <div class="col-12">
                      <a href="{{route('admin.viewbatch')}}" class="btn btn-warning">view</a>
                  </div>
                </div>    
            </div>
        </div>
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
