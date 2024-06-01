@extends('layout.teacherlayout')
@extends('layout.teacherheader')
@section('title')
teacher dashboard
@endsection
@section('content')

<div class="container m-5">
    <button type="button" class="btn btn-primary" id="dis" data-bs-toggle="modal" data-bs-target="#myModal">Generate QRCode</button>
</div>
                  
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
              {{QrCode::size(300)->generate($timetable_id)}}
            </div>

            <!-- Modal footer -->
            <div class="modal-footer ">
              <h1 class="bg-danger p-2 rounded text-light " id="countDown"></h1>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div> 
</div>
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
  var timer2 = "1:00";
var interval = setInterval(function() {
  var timer = timer2.split(':');
  //by parsing integer, I avoid all extra string processing
  var minutes = parseInt(timer[0], 10);
  var seconds = parseInt(timer[1], 10);
  --seconds;
  minutes = (seconds < 0) ? --minutes : minutes;
  if (minutes < 0) clearInterval(interval);
  seconds = (seconds < 0) ? 59 : seconds;
  seconds = (seconds < 10) ? '0' + seconds : seconds;
  //minutes = (minutes < 10) ?  minutes : minutes;
  $('#countDown').html(minutes + ':' + seconds);
  timer2 = minutes + ':' + seconds;
  setTimeout(function() { 
            $('#myModal').hide();
            $('#modal').modal('hide');
            $('#dis').prop('disabled', true);
            $('#modalDialog').hide();
        }, 60000);
}, 1000);
</script>
@endpush
