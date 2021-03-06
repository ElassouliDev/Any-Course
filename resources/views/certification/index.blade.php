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
{{--    <link rel="stylesheet" href="{{asset('course_assets/assets/css/fontawesome.min.css')}}">--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome-rtl.min.css') }}">

    <!-- Main Style Css -->
    <link rel="stylesheet" href="{{asset('course_assets/assets/css/sign.css')}}">

    <!-- Normalize CSS -->


    <title>Certification </title>
</head>
<body>

<div class="container-fluid">

    <div class="row">
        @if (!isset($print))
            <div class="col-sm-12 text-center " style="padding: 10px">
                <a class="btn btn-info border border-primary"
                   href="{{ route('course.certification',['course_slug'=>$certificate->course['slug_'.app()->getLocale()],'download'=>'pdf']) }}">Download
                    PDF <i class="fa fa-download"></i></a>
            </div>
        @endif
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
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="h1">Certificate of Completion</h1>
                        </div>
                        <div class="col-sm-12" style="margin-top: 20px">
                            <p style="font-size:25px"><i>This is to certify that</i></p>
                        </div>
                        <div class="col-sm-12">
                            <p class="h1" {{--style="font-size:30px"--}}><b
                                        class="">{{($certificate->user->first_name.' '.$certificate->user->last_name)??'Yehia Elassouli'}}</b>
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <p style="font-size:25px"><i>has completed the course</i></p>
                        </div>
                        <div class="col-sm-12">
                            <p style="font-size:30px">{{$certificate->course['title_en']??'Java Course'}}</p>
                        </div>
                        @if(isset($certificate->degree))
                            <div class="col-sm-12">
                                <p style="font-size:20px">with score of <b>{{$certificate->degree??'80'}}%</b></p>
                            </div>
                        @endif
                        <div class="col-sm-12">
                            <p style="font-size:25px"><i>dated</i></p>
                            {{$certificate->created_at}}
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

</body>
</html>
