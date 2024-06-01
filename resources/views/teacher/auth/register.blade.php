@extends('layout.teacherlayout')
@section('title')
    teacher rgister
@endsection
@section('content')
<div class="container-flud p-3">
    <div class="container alert-info p-2">
        <h3 class="text-info text-center p-2">Teacher Registration</h3>
            <form action="{{route('teacher.register')}}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="name" class="label-control">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name..">
                        <span class="text-danger">@error('name'){{$message}}@enderror</span>
                    </div>
                    
                    <div class="col-md-4">
                        <label for="facultyid" class="label-control">Teacher Id</label>
                        <input type="text" name="teacher-id" id="teacher-id" class="form-control" placeholder="Enter teacher id..">
                        <span class="text-danger">@error('teacher-id'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="email" class="label-control">Email ID</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email..">
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="mobile" class="label-control">Mobile Number</label>
                        <input type="tel" name="mobile-number" id="mobile" class="form-control" placeholder="Enter mobile number">
                        <span class="text-danger">@error('mobile-number'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="label-control">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="">--select--</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <span class="text-danger">@error('gender'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="course" class="label-control">Course Name</label>
                        {{-- <input type="text" name="course-name" id="course" class="form-control" placeholder="Enter course name.."> --}}
                        <select name="course-name" id="course-name" class="form-control">
                            <option value="">--select course--</option>
                            @foreach ($courses as $course)
                                <option value="{{$course->course_name}}">{{$course->course_name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('course-name'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="label-control">Branch Name</label>
                        {{-- <input type="text" name="branch-name" id="branch-name" class="form-control" placeholder="Enter branch name.."> --}}
                        <select name="branch-name" id="branch-name" class="form-control">
                            <option value="">--select branch--</option>
                            @foreach ($branches as $branch)
                                
                                <option value="{{$branch->branch_name}}">{{$branch->branch_name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('branch-name'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="role" class="">Role</label>
                        <select name="role" id="role" class="form-control">
                            <option value="">--select--</option>
                            <option value="teacher">teacher</option>
                        </select>
                        <span class="text-danger">@error('role'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="jdate" class="label-control">joining date</label>
                        <input type="date" name="joining-date" id="jdate" class="form-control" placeholder="Enter Joing date..">
                        <span class="text-danger">@error('joining-date'){{$message}}@enderror</span>
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
