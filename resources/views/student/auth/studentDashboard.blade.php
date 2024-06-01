@extends('layout.studentlayout')
@extends('layout.studentheader')
@section('title')
    student dashboard
@endsection
@if(Session::has('msg'))
    <div id="msg" class="from-group alert alert-success">{{Session::get('msg')}}</div>
@endif
@section('content')
    <div class="container">
        <div class="row p-2 ">
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <p class="card-title">Student Details</p>
                    </div>
                    <div class="card-body">
                        <p>Student Name : {{$student->name}}</p>
                        <p>Admission Number : {{$student->admission_number}}</p>
                        <p>Mobilw Number : {{$student->mobile_number}}</p>
                        <p>Gender : {{$student->gender}}</p>
                        <p>Beging Date : {{$student->start_date}}</p>
                        <p>Batch Name : {{$student->batch->batch_name}}</p>
                        <p>Session : {{$student->batch->session}}</p>
                        <p>Section : {{$student->batch->section}}</p>
                        <p>Semester : {{$student->batch->semester}}</p>
                    </div>
                </div>
            </div>
            <div class="col-8 border border-primary rounded">
                <table class="table table-bordered">
                    <p>Attendance</p>
                        <tr>
                            <th>Lacture Timing</th>
                            <th>Attendance</th>
                        </tr>
                        {{-- {{$attendances}} --}}
                    @forelse ($attendances as $attendance)
                    {{-- {{$attendance->markattendance}} --}}
                        <tr>
                            @if ($attendance->markattendance=="[]")
                                <td class="text-center bg-danger rounded text-light"><strong>A</strong></td>
                            @else
                                {{-- <td>{{$attendance->timetable->start_time}} : {{$attendance->timetable->end_time}}</td> --}}
                                
                                {{-- @if ($attendance->timetable->date==$attendance->timetable->date)--}}
                                @if ($attendance->created_at==$attendance->created_at)
                                <td>{{$attendance->created_at}}</td>
                                {{--<td>{{$attendance->timetable->date}} : ({{$attendance->timetable->start_time}} : {{$attendance->timetable->end_time}})</td> --}}
                                <td class="text-center bg-success rounded text-light"><strong>P</strong></td>
                                @endif
                                
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <p class="text-danger">Not data found!</p>
                        </tr>  
                    @endforelse
                        <tr>
                            <th>Total</th>
                            <td>{{count($attendances)}}</td>
                        </tr>
                </table>
                
                {{-- {{$attendances}} --}}
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