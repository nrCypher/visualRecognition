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
        </style>
    </head>
    <body>


    <div class="container">
           {{--  --}}
            @include('header')
<div class="sizeText">
            <div class="row text-center m-top-20">
                <div class="col-md-12">
                    <div class="alertLabelCustom alert alert-success" role="alert">
                        <div class="alertSuccessMessages">
                            Cenário Montagem de Caixas para Oferta
                        </div>
                    </div>
                </div>
            </div>

        </div>


            <div class="row">
                <div class="col-md-5 m-left-7">
                    <div class="row">
                        <div id="component1" class="square square-color-pattern-{{ $rgb[0] }} text-center">
                            <span class="f-size-200 check-success" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 m-left-3">
                    <div class="row">
                        <div id="component2" class="square square-color-pattern-{{ $rgb[1] }} text-center">
                            <span class="f-size-200 check-danger" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-top-20">
                <div class="col-md-5 m-left-7">
                    <div class="row">
                        <div id="component3" class="square square-color-pattern-{{ $rgb[2] }} text-center">
                            <span class="f-size-200 check-danger" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 m-left-3">
                    <div class="row">
                        <div id="component4" class="square square-color-pattern-{{ $rgb[3] }} text-center">
                            <span class="f-size-200 check-danger" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-top-20">
                <div class="col-md-5 col-md-offset-12">
                    <a class="btn-lg btn-primary f-size-23" href="{{ route('home') }}" role="button"><span class="glyphicon glyphicon-retweet" aria-hidden="true"></span></a>
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
        <script src="{{ URL::asset('js/custom.js') }}"></script>
        <script src="{{ URL::asset('js/speechrecognition.js') }}"></script>
    </body>
</html>
