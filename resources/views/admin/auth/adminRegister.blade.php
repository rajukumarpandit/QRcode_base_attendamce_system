@extends('layout.masterlayout')
@section('title')
    admin register
@endsection
@section('content')
<div class="container-flud p-2">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-5 p-5 text-center">
                <h2 class="text-info">Your Welcome!</h2>
                <h5 class="text-info">Galgotias University</h5>
            </div>
            <div class="col-md-4 p-3">
                <div class="card mt-1">
                    <div class="card-header">
                        <h3 class="card-title text-info text-center">Admin Register</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.register')}}" method="post">
                            @csrf
                            @if(Session::has('msg'))
                                <div id="msg" class="from-group alert alert-danger">{{Session::get('msg')}}</div>
                            @endif
                            <div class="from-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter name ....">
                                <span class="text-danger">@error('name'){{$message}}@enderror</span>
                            </div>
                            <div class="from-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter email ...">
                                <span class="text-danger">@error('email'){{$message}}@enderror</span>
                            </div>
                            <div class="from-group">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="">--select--</option>
                                    <option value="admin">admin</option>
                                </select>
                                <span class="text-danger">@error('role'){{$message}}@enderror</span>
                            </div>
                            <div class="from-group">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" @error('password') ia-invalid @enderror placeholder="Enter password ....">
                                <span class="text-danger">@error('password'){{$message}}@enderror</span>
                            </div>
                            <div class="from-group">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Enter confirm password ...">
                                <span class="text-danger">@error('password_confirmation'){{$message}}@enderror</span>
                            </div>
                            <div class="from-group mt-2">
                                <button type="submit" class="btn btn-info">Register</button>
                            </div>
                        </form>
                        <p class="d-flex justify-content-between"><a href="{{route('admin.login')}}" class="btn text-success">Have you already register?  Login</a></p>
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
        }, 2000);
    });
</script>
    
@endpush