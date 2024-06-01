<div class="container-fluid bg-info p-1">
    <nav class="navbar navbar-expand-lg navbar-light m-2">
        <div class="container-fluid">
            <h2>Admin</h2>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('admin.dashboard')}}">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" 
              aria-expanded="false">
                  Profile
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="{{route('student.register')}}">Register</a></li>
                  <li><a class="dropdown-item" href="#">Edit</a></li>
                  <li><a class="dropdown-item" href="#">Delete</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" 
              aria-expanded="false">
                  All Batch
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  {{-- <li><a class="dropdown-item" href="">New Course</a></li> --}}
                  <li><a class="dropdown-item" href="{{route('admin.batch')}}">New Batch</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" 
              aria-expanded="false">
                  All Subject
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  {{-- <li><a class="dropdown-item" href="">New Course</a></li> --}}
                  <li><a class="dropdown-item" href="{{route('admin.subject')}}">New Subject</a></li>
                  <li><a class="dropdown-item" href="{{route('admin.viewsubject')}}">View</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" 
              aria-expanded="false">
                  Time-table
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="{{route('admin.timetable')}}">New schedule</a></li>
                </ul>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link" href="ti">Time Table</a>
              </li> --}}
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('admin.logout')}}">LogOut</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
</div>