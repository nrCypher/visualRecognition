<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bancada de Teste</title>

    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

    <!-- Styles -->
    <style>
        body {
            background-color: #FFFFFF;
        }
        div#video_player_box{ width:550px; background:#000; margin:0px auto;}
        div#video_controls_bar{ background: #333; padding:10px;}
    </style>
</head>
<body>


<div class="container">
    {{--  --}}
    @include('header')

    <div class="row text-center m-top-20">
        <div class="col-md-12">
            <div class="alertLabelCustom alert alert-success" role="alert">
                <div class="alertSuccessMessages">
                    <h1>Cenário Montagem de Sequência de Operação</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-5 m-left-7">
            <div class="row">
                <p>Peça Final</p>
                <img style="height: 200px;" src="{{ asset($finalSequence->image) }}">
            </div>
        </div>

        <div class="col-md-5 m-left-3">
            <div class="row">

               <p>Sequência #<span class="step">1</span>/{{ $totalSteps }}</p>

                <img id="sequenceStep" style="height: 200px;" src="{{ asset($sequence->image) }}">
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Step</h4>
                </div>
                <div class="modal-body">
                    <div id="video_player_box">
                        <video id="my_video" width="550" height="300" autoplay>
                            <source id="video" src="">
                        </video>
                        <div id="video_controls_bar">
                            <button id="playpausebtn" onclick="playPause(this,'my_video')">Pause</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row m-top-20">
        <div class="col-md-5 col-md-offset-12">
            <a class="btn-lg btn-primary f-size-23" href="{{ route('homeSequence') }}" role="button"><span class="glyphicon glyphicon-retweet" aria-hidden="true"></span></a>
            <!--<button class="btn btn-primary" id="start_button" onclick="startButton(event)">Falar</button>-->
            <button class="btn btn-primary" id="start_button" onclick="startButton(event)">Falar</button>
        </div>
    </div>

    {{--<div class="row text-center m-top-20">--}}
    {{--<div class="col-md-12">--}}
    {{--<div class="alertLabelCustom alert alert-danger hidden" role="alert">--}}
    {{--<div class="alertSuccessMessages">--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
</div>

<div class="container m-top-20">
    <div class="row text-center">
        <div class="col-md-12">
            <img src="{{ URL::asset('images/ipb.png') }}" style="width: 270px">
            <img src="{{ URL::asset('images/parceiros.png') }}" style="width: 714px; margin-left: 74px;">
        </div>
    </div>
</div>

<div class="col-md-12" style="background-color: grey; color: white;">
    <p id="speechText"></p>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/sequence.js') }}"></script>
    <script src="{{ URL::asset('js/speechrecognitionSeq.js') }}"></script>

    <script>
        var totalSteps = <?php echo $totalSteps; ?>;
        var step = 1;
        var sequence = <?php echo $sequence->sequence; ?>;

        function playPause(btn,vid){
            var vid = document.getElementById(vid);
            if(vid.paused){
                vid.play();
                btn.innerHTML = "Pause";
            } else {
                vid.pause();
                btn.innerHTML = "Play";
            }
        }

        document.getElementById('my_video').addEventListener('ended',myHandler,false);
        function myHandler(e) {
            $('#myModal').modal('hide');
        }
    </script>
</body>
</html>
