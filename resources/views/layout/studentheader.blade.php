<div class="container-fluid bg-info p-1">
    <nav class="navbar navbar-expand-lg navbar-light m-2">
        <div class="container-fluid">
            <h2>Student</h2>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('student.dashboard')}}">Home</a>
                </li>
                @if (session()->has('student_email'))
                    <li class="nav-item">
                        <a class="nav-link" href="">{{session()->get('student_email')}}</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('student.scan')}}">Scan QR</a>
                    </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Attendance
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Day wise</a></li>
                        <li><a class="dropdown-item" href="#">Weak Wise</a></li>
                        <li><a class="dropdown-item" href="#">Month Wise</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Profile
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="{{route('student.register')}}">Register</a></li>
                    <li><a class="dropdown-item" href="{{route('student.register')}}">Edit</a></li>
                    <li><a class="dropdown-item" href="#">Delete</a></li>
                </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('student.logout')}}">LogOut</a>
                </li>
            </ul>
          </div>
        </div>
      </nav>
</div>