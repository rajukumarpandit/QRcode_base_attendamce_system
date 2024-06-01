@extends('layout.teacherlayout')
@extends('layout.teacherheader')
@section('title')
teacher dashboard
@endsection
@section('content')
    <div class="container">
        
        <h1 class="text-center text-success">Summary of Student Attendance</h1>
        <div class="row">

            {{-- <div class="col-md-3">
                <form action="{{route('teacher.attendance')}}" method="get">
                    @csrf
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <select name="batch" id="batch" class="form-control">
                                <option value="">--select batch for filter--</option>
                                @forelse ($batches as $batch)
                                <option value="{{$batch->id}}">Batch {{$batch->id}}</option>
                                @empty
                                <option value=""> data not found</option>
                                @endforelse    
                            </select>
                            <div class="input-group-append">
                              <button class="btn btn-success" type="submit">filter</button>
                            </div>
                          </div>
                    </div>
                </form>
            </div> --}}
        </div>
        @isset($students)
        <div class="row text-center m-3">
            <div class="col-md-4 border">
                <h3 >Total Students : {{count($students)}}</h3>
            </div>
            <div class="col-md-4 border ">
                <h3>Total Presents : <strong class="text-success">{{count($present)}}</strong></h3>
            </div>
            <div class="col-md-4 border">
                <h3>Total Absents  : <strong class="text-danger">{{count($absent)}}</strong></h3>
            </div>
        </div>
        
        <table class="table table-bordered rounded">
            <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Admission number</th>
                <th>P/A</th>
            </tr>
        
        @forelse ($students as $student)
            <tr>
                <td>
                    {{$student->id}}
                </td>
                <td>
                    {{$student->name}}
                </td>
                <td>
                    {{$student->admission_number}}
                </td>
                @if ($student->student_id==null && $student->time_table_id==null)
                <td class="text-center bg-danger rounded text-light"><strong>A</strong></td>
                @else
                <td class="text-center bg-success rounded text-light"><strong>P</strong></td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center text-danger">Data not found!</td>
            </tr>
        @endforelse
        </table>
        @endisset
    </div>

@endsection