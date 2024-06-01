
@extends('layout.teacherlayout')
@section('title')
    teacher login
@endsection
@section('content')
    <div class="container-flud p-2">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mt-5 p-5 text-center">
                    <h2 class="text-info">Your Welcome!</h2>
                    <h5 class="text-info">Galgotias University</h5>
                </div>
                <div class="col-md-4 mt-5 p-3">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3 class="card-title text-info text-center">Login</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('teacher.login')}}" method="POST">
                                @csrf
                                {{-- @isset($msg)
                                <div id="msg" class="from-group alert alert-success">{{$msg}}</div>
                                @endisset --}}
                                @if(Session::has('msg'))
                                    <div id="msg" class="from-group alert alert-success">{{Session::get('msg')}}</div>
                                @endif
                                @if(Session::has('error'))
                                    <div id="error" class="from-group alert alert-danger">{{Session::get('error')}}</div>
                                @endif
                                <div class="from-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter email ...">
                                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                                </div>
                                <div class="from-group">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="">--select--</option>
                                        <option value="teacher">teacher</option>
                                    </select>
                                    <span class="text-danger">@error('role'){{$message}}@enderror</span>
                                </div>
                                <div class="from-group mt-2">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password ...">
                                    <span class="text-danger">@error('password'){{$message}}@enderror</span>
                                </div>
                                <div class="from-group mt-2">
                                    <button type="submit" class="btn btn-info">Login</button>
                                </div>
                            </form>
                            <p class="d-flex justify-content-between"><a href="{{route('teacher.register')}}" class="btn text-success">Have you not register? Register</a><a href="#" class="btn text-danger">Forgot</a></p>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    $(document).ready(function(){
        setTimeout(function() { 
            $('#msg').hide();
            $('#error').hide();
        }, 2000);
        // $(".btn").click(function(){
        //     $(this).append('<span class="spinner-border spinner-border-sm"></span>');
        //     $(this).text('logging...').setTimeout(function(){},50000);
        // })
    });
</script>
    
@endpush