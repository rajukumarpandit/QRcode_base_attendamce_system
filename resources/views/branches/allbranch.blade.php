@extends('layout.masterlayout')
@extends('layout.header')
@section('title')
    All Branches
@endsection
@if(Session::has('msg'))
        <div id="msg" class="from-group alert alert-success">{{Session::get('msg')}}</div>
    @endif
@section('content')
    <div class="row">
        <h1 class="text-center">All Branches</h1>
    </div>
    <div class="row justify-content-between">
        @forelse ($branches as $branch)
            {{-- <div class="col-3 g-2 border border-primary rounded m-1 p-4"> --}}
                
                <div class="card text-center border-primary mt-3 p-4" style="max-width: 19rem;">
                    <div class="card-body">
                      <h5 class="card-title p-3">{{$branch->branch_name}} ({{$branch->branch_code}})</h5>
                      <div class="row">
                        <div class="col-4">
                            <a href="#" class="btn btn-primary">edit</a>
                        </div>
                        <div class="col-4">
                            <a href="#" class="btn btn-danger">delete</a>
                        </div>
                        <div class="col-4">
                            <a href="{{route('admin.semester',$branch->id)}}" class="btn btn-warning">Semester</a>
                        </div>
                      </div>
                      
                    </div>
                  </div>
            {{-- </div> --}}
        @empty
            <p>Data not available</p>
        @endforelse
    </div>
    
@endsection