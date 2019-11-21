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
        @include('header')


            <div class="row text-center m-top-20">
                <div class="col-md-12">
                    <div class="alertLabelCustom alert alert-success" role="alert">
                        <div class="alertSuccessMessages">
                            Escolha o cenário...
                        </div>
                    </div>
                </div>
            </div>


            <div class="row row">
                <div class="col-md-5 m-left-7">
                    <div class="row text-center">
                            <a href="{{ route('home') }}" class="botaoInit align-text-bottom  btn btn-success" role="button"><h2>Montagem de GiftBox</h2></a>
                    </div>
                </div>

                <div class="col-md-5 m-left-3">
                    <div class="row text-center">
                            <a href="{{ route('homeSequence') }}" class="botaoInit align-text-bottom btn btn-success" role="button"><h2>Operação de sequência</h2></a>
                    </div>
                </div>
            </div>


        </div>

        <div class="container m-top-20">
            <div class="row text-center">
                <div class="col-md-12">
                    <img src="{{ URL::asset('images/ipb.png') }}" style="width: 179px">
                    <img src="{{ URL::asset('images/parceiros.png') }}" style="width: 714px">
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        {{--<script src="{{ URL::asset('js/custom.js') }}"></script>--}}
    </body>
</html>
