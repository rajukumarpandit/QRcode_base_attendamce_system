@extends('layout.studentlayout')
@section('title')
    student register
@endsection
@section('content')
    <div class="container-flud p-3">
        <div class="container alert-info p-2">
            <h3 class="text-info text-center p-2">Student Registration</h3>
                <form action="{{route('student.register')}}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="name" class="label-control">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name..">
                            <span class="text-danger">@error('name'){{$message}}@enderror</span>
                        </div>
                        <div class="col-md-4">
                            <label for="admissionNo" class="label-control">Admission Number</label>
                            <input type="text" name="admission-number" id="admissionNo" class="form-control" placeholder="Enter Admission Number">
                            <span class="text-danger">@error('admission-number'){{$message}}@enderror</span>
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="label-control">Email ID</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email..">
                            <span class="text-danger">@error('email'){{$message}}@enderror</span>
                        </div>
                        
                        <div class="col-md-4">
                            <label for="mobile" class="label-control">Mobile Number</label>
                            <input type="tel" name="mobile-number" size="10" id="mobile" class="form-control" placeholder="Enter mobile number">
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
                            <label for="" class="label-control">Batch Name</label>
                            {{-- <input type="text" name="branch-name" id="branch-name" class="form-control" placeholder="Enter branch name.."> --}}
                            <select name="batch-id" id="" class="form-control">
                                <option value="">--select branch--</option>
                                @foreach ($batches as $batch)
                                    
                                    <option value="{{$batch->id}}">{{$batch->batch_name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('batch-id'){{$message}}@enderror</span>
                        </div>
                        
                        <div class="col-md-4">
                            <label for="sdate" class="label-control">Session Starting Date</label>
                            <input type="date" name="start-date" id="sdate" class="form-control" placeholder="Enter Starting date..">
                            <span class="text-danger">@error('start-date'){{$message}}@enderror</span>
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
@stack('script')
@stack('style')