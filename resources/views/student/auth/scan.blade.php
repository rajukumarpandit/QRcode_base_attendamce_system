@extends('layout.studentlayout')
@extends('layout.studentheader')
@section('content')

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <video id="preview"></video>
            </div>
            <div class="btn-group btn-group-toggle m-5" data-toggle="buttons">
                <label class="btn btn-primary active">
                  <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
                </label>
                <label class="btn btn-secondary">
                  <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
                </label>
            </div>
        </div>
    </div>
</div>
{{-- <form action="{{route('student.mark')}}" method="post">
    @csrf
    <label for="">Code</label>
    <input type="text" class="form-control" name="id" id="datashow" readonly>
    <button class="btn-submit" type="submit">OK</button>
</form> --}}
<div id="sh" class="modal">
    <div class="box1">
        <form action="{{route('student.mark')}}" method="post">
            @csrf
            <div class="form-group">
                {{-- <i class="bi bi-person-raised-hand"></i> --}}
                <h1><i class="bi bi-check-circle-fill"></i></h1>
                <h1>Mark Your attendance</h1>
                <p>please click on OK button</p>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="id" id="datashow">
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-info btn-lg" type="submit">OK</button>
            </div>
        </form>
    </div>
</div>

@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script type="text/javascript" src="instascan.min.js"></script>
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" rel="nofollow"></script>
<script type="text/javascript">
   
    $('#sh').hide();
    var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: true });
    scanner.addListener('scan',function(content){
        //alert(content);
            function showStuff(content) {
                $('#sh').show();
                document.getElementById('sh').style.display = 'block';
            }
            if(content){
                showStuff();
            }
        document.getElementById('datashow').value=content;
        //window.location.href=content;
    });
    Instascan.Camera.getCameras().then(function (cameras){
    
        if(cameras.length>0){
            scanner.start(cameras[0]);
            $('[name="options"]').on('change',function(){
                if($(this).val()==1){
                    if(cameras[0]!=""){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    if(cameras[1]!=""){
                        scanner.start(cameras[1]);
                    }else{
                        alert('No Back camera found!');
                    }
                }
            });
        }else{
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e){
        console.error(e);
        alert(e);
    });
    let opts = {
  // Whether to scan continuously for QR codes. If false, use scanner.scan() to manually scan.
  // If true, the scanner emits the "scan" event when a QR code is scanned. Default true.
  continuous: true,
  
  // The HTML element to use for the camera's video preview. Must be a <video> element.
  // When the camera is active, this element will have the "active" CSS class, otherwise,
  // it will have the "inactive" class. By default, an invisible element will be created to
  // host the video.
  video: document.getElementById('preview'),
  
  // Whether to horizontally mirror the video preview. This is helpful when trying to
  // scan a QR code with a user-facing camera. Default true.
  mirror: true,
  
  // Whether to include the scanned image data as part of the scan result. See the "scan" event
  // for image format details. Default false.
  captureImage: false,
  
  // Only applies to continuous mode. Whether to actively scan when the tab is not active.
  // When false, this reduces CPU usage when the tab is not active. Default true.
  backgroundScan: true,
  
  // Only applies to continuous mode. The period, in milliseconds, before the same QR code
  // will be recognized in succession. Default 5000 (5 seconds).
  refractoryPeriod: 5000,
  
  // Only applies to continuous mode. The period, in rendered frames, between scans. A lower scan period
  // increases CPU usage but makes scan response faster. Default 1 (i.e. analyze every frame).
  scanPeriod: 1
};
</script>
@endpush
@push('style')
<style>
    #preview{
        border: 5px solid salmon;
        border-radius:5px;
    }
    .modal{
        width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0.6);
            top: 0;
            left: 0;
            position: absolute;
            z-index: 1;
            /* visibility: hidden; */
    } 
    .box1{
            margin-top: 10%;
            margin-left: 35%;
            background: #f9f9f9;
            color: gray;
            padding: 10px;
            width: 30%;
            height: auto;
            border-radius: 5%;
            display: flex;
            text-align: center;
            justify-content: center;
    }  
    i{
        font-size: 100px;
        color: green;
    }
</style>
@endpush
