@extends('layout.teacherlayout')
@extends('layout.teacherheader')
@section('title')
teacher dashboard
@endsection
@section('content')
<div class="container alert-info mt-2 p-3">
    <div class="row">
      <h3 class="alert text-center p-2">Take Attendance</h3>
    </div>
    <div class="row">
        {{-- {{$timetables}} --}}
        @forelse ($timetables as $timetable)
        <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <p class="text-primary">Date : {{$timetable->date}}</p>
                <p>Section : {{$timetable->batch['section']}}</p>
                <p>Session : {{$timetable->batch['session']}}</p>
                <p>Batch : {{$timetable->batch['batch_name']}}</p>
                <p>Subject : {{$timetable->subject['subject_name']}} ({{$timetable->subject['subject_code']}})</p>
                <p>Time : {{$timetable->start_time}} : {{$timetable->end_time}}</p>
                <p>Room : {{$timetable->room_number}}</p>
                <a href="{{route('teacher.QRcode',$timetable->id)}}" id="dis" class="btn btn-primary">QR Code</a>
                <a class="btn btn-primary" href="{{route('teacher.attendance',$timetable->id)}}">View</a>
                {{-- <form action="" method="post">
                  <input type="hidden" name="Timetableid" id="Timetableid" value="">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Generate QRCode
                  </button>
                  <!-- The Modal -->
                  <div class="modal" id="myModal">
                    <div class="modal-dialog" id="modalDialog">
                      <div class="modal-content">
                  
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Student Qrcode</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                  
                        <!-- Modal body -->
                        <div class="modal-body text-center">
                          {{QrCode::size(300)->generate($timetable->id)}}
                          {{$timetable->id}}
                        </div>
                  
                        <!-- Modal footer -->
                        <div class="modal-footer">
                          
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                  
                      </div>
                    </div>
                  </div>
                </form>  --}}
              </div>
            </div>
          </div>
        @empty
        <p class="text-center text-danger">No data found!</p>
        @endforelse
    </div>
  </div>
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    // $(document).ready(function(){
    //     setTimeout(function() { 
    //       $('#dis').hide();
    //     }, 3000);
    // });
</script>
    
@endpush
