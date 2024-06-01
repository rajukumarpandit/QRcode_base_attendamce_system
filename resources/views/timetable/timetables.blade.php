@extends('layout.masterlayout')
@extends('layout.header')
@section('title')
    time table
@endsection
@if(Session::has('msg'))
        <div id="msg" class="from-group alert alert-success">{{Session::get('msg')}}</div>
    @endif
@section('content')
<div class="container-flud p-3">
    <div class="container alert-info p-2">
        <h3 class="text-info text-center p-2">Time Table</h3>
            <form action="{{route('admin.timetable')}}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="">Admin Id</label>
                        <input type="text" name="admin-id" id="" class="form-control" value="{{$admins->id}}" readonly>
                        <span class="text-danger">@error('admin-id'){{$message}}@enderror</span>
                        
                    </div>
                    <div class="col-md-4">
                        <label for="teacherid">Teacher</label>
                        {{-- <input type="text" name="teacher-id" id="teacherid" class="form-control"> --}}
                        <select name="teacher-id" id="" class="form-control">
                            <option value="">--select--</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('teacher-id'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="label-control">Subject</label>
                        {{-- <input type="text" name="subject-id" id="subject" class="form-control" placeholder="Enter Subject Name.."> --}}
                        <select name="subject-id" id="" class="form-control">
                            <option value="">--select--</option>
                            @foreach ($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('subject-id'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="label-control">Batch</label>
                        {{-- <input type="text" name="subject-id" id="subject" class="form-control" placeholder="Enter Subject Name.."> --}}
                        <select name="batch-id" id="" class="form-control">
                            <option value="">--select--</option>
                            @foreach ($batches as $batch)
                                <option value="{{$batch->id}}">{{$batch->batch_name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('batch-id'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="roomno" class="label-control">Room Number</label>
                        <input type="text" name="room-number" id="roomno" class="form-control" placeholder="Enter Room Number..">
                        <span class="text-danger">@error('room-number'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="date" class="label-control">Date</label>
                        <input type="date" name="date" id="date" class="form-control" placeholder="Enter Date..">
                        <span class="text-danger">@error('date'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="stime" class="label-control">Session Starting time</label>
                        <input type="time" name="start-time" id="stime" class="form-control" placeholder="Enter Starring Time..">
                        <span class="text-danger">@error('start-time'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="label-control">Session Ending time</label>
                        <input type="time" name="end-time" id="" class="form-control" placeholder="Enter Ending Time..">
                        <span class="text-danger">@error('end-time'){{$message}}@enderror</span>
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
