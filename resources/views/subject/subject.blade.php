@extends('layout.masterlayout')
@extends('layout.header')
@section('title')
    Subject
@endsection
@if(Session::has('msg'))
        <div id="msg" class="from-group alert alert-success">{{Session::get('msg')}}</div>
    @endif
@section('content')
<div class="container-flud p-3">
    <div class="container alert-info p-2 justify-content-center">
        <h3 class="text-info text-center p-2">New Subject</h3>
            <form action="{{route('admin.subject')}}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-8">
                        <label for="">Branch ID</label>
                        {{-- <input type="text" name="branch_id" id="" class="form-control" readonly> --}}
                        <select name="branch_id" id="" class="form-control">
                            <option value="">--select--</option>
                            @forelse ($branches as $branch)
                            <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                            @empty
                            <option value="">nothing</option>
                            @endforelse
                        </select>
                        <span class="text-danger">@error('branch_id'){{$message}}@enderror</span>
                        
                    </div>
                    <div class="col-md-8">
                        <label for="course" class="label-control">Subject Code</label>
                        <input type="text" name="subject-code" id="" class="form-control" placeholder="Enter subject code..">
                        <span class="text-danger">@error('subject-code'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-8">
                        <label for="subject" class="label-control">Subject Name</label>
                        <input type="text" name="subject-name" id="" class="form-control" placeholder="Enter Subject Name..">
                        <span class="text-danger">@error('subject-name'){{$message}}@enderror</span>
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
