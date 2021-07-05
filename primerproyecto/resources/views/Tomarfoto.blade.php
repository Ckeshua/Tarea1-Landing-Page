@extends('welcome')



@section('content')

<head>
    <title>WebRTC: Still photo capture demo</title>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="main.css" type="text/css" media="all">
    <script src="capture.js">
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <!--mokup-->
        <div>
            <div>

                <div class="container">
                    <div class="col text-center" style="margin-top:8%">

                        <select id="seguridad" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                            <option selected>Seleccionar nivel de archivo</option>
                            <option value="Seguridad nivel 3">Secretario para arriba</option>
                            <option value="Seguridad nivel 2">Trabajador de planta para arriba</option>
                            <option value="Seguridad nivel 1">Practicante para arriba</option>
                        </select>


                        <select id="Tipode" class="form-select form-select-sm" aria-label=".form-select-sm example" style="margin-top: 40px" required>
                            <option selected>Seleccionar tipo de archivo</option>
                            <option value="Contrato">Contrato</option>
                            <option value="Boletas">boletas</option>
                            <option value="Tipo 3">Tipo 3</option>
                        </select>

                    </div>

                </div>




            </div>
            <div class="col text-center">

                <div class="col text-center" style="margin-top:40px">

                    <button id="startbutton" type="button" class="btn btn-primary">ESCANEAR</button>
                    <a href="generate-pdf" class="btn btn-success"> SUBIR </a>

    </header>
    <div class="contentarea" style="display: flex; flex-wrap: wrap;">


        <div class="camera">
            <video id="video">Video stream not available.</video>

        </div>
        <form style="display: inline;">
            <canvas id="canvas">
            </canvas>
        </form>
        <div style="max-width: 500px; min-width: 340px;"></div>
        <div id="writeinfo" style="overflow: auto; width:340px; height: 190px;"></div>
    </div>
</body>

<script>
    (function() {
        // The width and height of the captured photo. We will set the
        // width to the value defined here, but the height will be
        // calculated based on the aspect ratio of the input stream.

        var width = 320; // We will scale the photo width to this
        var height = 0; // This will be computed based on the input stream

        // |streaming| indicates whether or not we're currently streaming
        // video from the camera. Obviously, we start at false.

        var streaming = false;

        // The various HTML elements we need to configure or control. These
        // will be set by the startup() function.

        var video = null;
        var canvas = null;
        var photo = null;
        var startbutton = null;

        function startup() {
            video = document.getElementById('video');
            canvas = document.getElementById('canvas');
            photo = document.getElementById('photo');
            startbutton = document.getElementById('startbutton');

            navigator.mediaDevices.getUserMedia({
                    video: true,
                    audio: false
                })
                .then(function(stream) {
                    video.srcObject = stream;
                    video.play();
                })
                .catch(function(err) {
                    console.log("An error occurred: " + err);
                });

            video.addEventListener('canplay', function(ev) {
                if (!streaming) {
                    height = video.videoHeight / (video.videoWidth / width);

                    // Firefox currently has a bug where the height can't be read from
                    // the video, so we will make assumptions if this happens.

                    if (isNaN(height)) {
                        height = width / (4 / 3);
                    }

                    video.setAttribute('width', width);
                    video.setAttribute('height', height);
                    canvas.setAttribute('width', width);
                    canvas.setAttribute('height', height);
                    streaming = true;
                }
            }, false);

            startbutton.addEventListener('click', function(ev) {
                takepicture();
                ev.preventDefault();
            }, false);

            clearphoto();
        }

        // Fill the photo with an indication that none has been
        // captured.

        function clearphoto() {
            var context = canvas.getContext('2d');
            context.fillStyle = "#AAA";
            context.fillRect(0, 0, canvas.width, canvas.height);

            var data = canvas.toDataURL('image/jpg');
            photo.setAttribute('src', data);
        }

        // Capture a photo by fetching the current contents of the video
        // and drawing it into a canvas, then converting that to a PNG
        // format data URL. By drawing it on an offscreen canvas and then
        // drawing that to the screen, we can change its size and/or apply
        // other changes before drawing it.

        function takepicture() {
            var context = canvas.getContext('2d');
            if (width && height) {
                canvas.width = width;
                canvas.height = height;
                context.drawImage(video, 0, 0, width, height);

                var data = canvas.toDataURL('image/jpg');
                photo.setAttribute('src', data);

            } else {
                clearphoto();
            }
        }

        // Set up our event listener to run the startup process
        // once loading is complete.
        window.addEventListener('load', startup, false);
    })();
    $("#startbutton").click(function() {
        clearTimeout($(this).data('timer'))

        var timer = setTimeout(function() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var canvas = document.getElementById('canvas');
            var dataURL = canvas.toDataURL();

            $.ajax({
                /* the route pointing to the post function */
                url: '{{route("guardarimg")}}',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {
                    _token: CSRF_TOKEN,
                    imgBase64: dataURL
                },
                /* remind that 'data' is the response of the AjaxController */
                success: function(data) {
                    $(".writeinfo").append(data.msg);
                    $(".writeinfo").append("aca").append(data.msg2);
                    $(".writeinfo").append("aca2").append(data.msg3);
                }
            });
        }, 500);
        $(this).data('timer', timer);
    });
</script>



@endsection