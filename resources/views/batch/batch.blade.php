@extends('layout.masterlayout')
@extends('layout.header')
@section('title')
    New Batch
@endsection
@if(Session::has('msg'))
        <div id="msg" class="from-group alert alert-success">{{Session::get('msg')}}</div>
    @endif
@section('content')
<div class="container-flud p-3">
    <div class="container alert-info p-2">
        <h3 class="text-info text-center p-2">New Batch</h3>
            <form action="{{route('admin.batch')}}" method="POST">
                @csrf
                <div class="row g-3">
                    
                    <div class="col-md-4">
                        <label for="">Course Name</label>
                        <select name="course-id" id="" class="form-control">
                            <option value="">--select--</option>
                            @forelse ($courses as $course)
                            <option value="{{$course->id}}">{{$course->course_name}}</option>
                            @empty
                            <option value="">nothing</option>
                            @endforelse
                        </select>
                        <span class="text-danger">@error('course-id'){{$message}}@enderror</span>
                        
                    </div>
                    <div class="col-md-4">
                        <label for="">Branch Name</label>
                        {{-- <input type="text" name="branch_id" id="" class="form-control" readonly> --}}
                        <select name="branch-id" id="" class="form-control">
                            <option value="">--select--</option>
                            @forelse ($branches as $branch)
                            <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                            @empty
                            <option value="">nothing</option>
                            @endforelse
                        </select>
                        <span class="text-danger">@error('branch-id'){{$message}}@enderror</span>
                        
                    </div>
                    <div class="col-md-4">
                        <label for="subject" class="label-control">Session</label>
                        <input type="text" name="session" id="" class="form-control" placeholder="Enter Session Name..">
                        <span class="text-danger">@error('session'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="label-control">Section</label>
                        {{-- <input type="text" name="day" id="day" class="form-control" placeholder="Enter Day Name.."> --}}
                        <select name="section" id="section" class="form-control">
                            <option value="">--select section--</option>
                            <option value="1">Section 1</option>
                            <option value="2">Section 2</option>
                            <option value="3">Section 3</option>
                            <option value="4">Section 4</option>
                            <option value="5">Section 5</option>
                            <option value="6">Section 6</option>
                            <option value="7">Section 7</option>
                        </select>
                        <span class="text-danger">@error('section'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="label-control">Semester</label>
                        {{-- <input type="text" name="semester" id="semester" class="form-control" placeholder="Enter branch name.."> --}}
                        <select name="semester" id="semester" class="form-control">
                            <option value="">--select semester--</option>
                            <option value="1">Sem I</option>
                            <option value="2">Sem II</option>
                            <option value="3">Sem III</option>
                            <option value="4">Sem IV</option>
                            <option value="5">Sem V</option>
                            <option value="6">Sem VI</option>
                            <option value="7">Sem VII</option>
                            <option value="8">Sem VII</option>
                            
                        </select>
                        <span class="text-danger">@error('semester'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 text-align-end">
                        <button type="submit" class="btn bg-info text-white mt-3">Submit</button>
                    </div>
                </div>
            </form>
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
