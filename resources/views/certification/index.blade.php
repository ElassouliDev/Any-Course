{{--@extends('layouts.layout')--}}

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Disable Zooming in mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('course_assets/assets/lib/bootstrap/css/bootstrap.min.css')}}">

    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{asset('course_assets/assets/css/normalize.css')}}">

    <!-- Fontawesome CSS -->
{{--    <link rel="stylesheet" href="{{asset('course_assets/assets/css/all.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('course_assets/assets/css/fontawesome.min.css')}}">

    <!-- Main Style Css -->
    <link rel="stylesheet" href="{{asset('course_assets/assets/css/sign.css')}}">

    <!-- Normalize CSS -->


    <title>Certification </title>
</head>
<body>
<!-- Start Navigation -->
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{url('/')}}">
                <img alt="Brand" src="{{asset('course_assets/assets/images/logo.png')}}">
                Any Course
            </a>
        </div><!-- /.navbar-header -->
    </div><!-- /.container -->
</nav>
<!-- End Navigation -->

<div class="container">

    <div class="row">
            <div class="col-sm-12 text-center" style=" padding:7px 20px; border: 10px solid #787878">
                <div class="row  h-100">
                    <div class="col-sm-12 h-100" style="padding:20px; text-align:center; border: 5px solid #787878">
                        <div class="row">
                            <div class="col-sm-6">
                                <a class="navbar-brand">
                                    <img alt="Brand" src="{{asset('course_assets/assets/images/logo.png')}}">
                                    Any Course
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a class="navbar-brand" style="float: right">
                                    <img alt="Brand" src="{{asset('course_assets/assets/images/logo.png')}}">
                                    Any Course
                                </a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-sm-12">
                                <h1 class="h1">Certificate of Completion</h1>
                            </div>
                            <div class="col-sm-12" style="margin-top: 20px">
                                <p style="font-size:25px"><i>This is to certify that</i></p>
                            </div>
                            <div class="col-sm-12">
                                <p class="h1" {{--style="font-size:30px"--}}><b class="">{{$name??'Yehia Elassouli'}}</b></p>
                            </div>
                            <div class="col-sm-12">
                                <p style="font-size:25px"><i>has completed the course</i></p>
                            </div>
                            <div class="col-sm-12">
                                <p style="font-size:30px">{{$course??'Java Course'}}</p>
                            </div>
                            <div class="col-sm-12">
                                <p style="font-size:20px">with score of <b>{{$score??'80'}}%</b></p>
                            </div><div class="col-sm-12">
                                <p style="font-size:25px"><i>dated</i></p>
                                {{date('M-d-Y')}}
                            </div>
                        </div>
                        <div>
                        </div>
                        <br><br>
                        <br><br>

                        {{--<span style="font-size:30px">$dt</span>--}}
                    </div>
                </div>

            </div>
            <div class="panel panel-default">

                <div class="panel-body">
                    <!-- Nav tabs -->

                    <!-- Tab panes -->
                    <div class="tab-content">



                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{--@stop--}}
<!-- JQuery 1.12.4 -->
<script src="{{asset('course_assets/assets/lib/jquery/jquery.min.js')}}"></script>
<script src="{{asset('course_assets/assets/lib/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('sweetalert/2.1.0/sweetalert.min.js') }}"></script>
<script src="{{ asset('resources/assets/js/globals.js') }}"></script>
<script src="{{ asset('resources/assets/js/lists.js') }}"></script>
<script src="{{ asset('resources/assets/js/notifications.js') }}"></script>
<script src="{{ asset('resources/assets/js/http.js') }}"></script>
<script src="{{ asset('resources/assets/js/editable.js') }}"></script>


</body>
</html>
