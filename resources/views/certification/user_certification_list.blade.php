@extends('layouts.layout')

{{--    <!DOCTYPE html>
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
--}}{{--    <link rel="stylesheet" href="{{asset('course_assets/assets/css/all.min.css')}}">--}}{{--
<link rel="stylesheet" href="{{asset('course_assets/assets/css/fontawesome.min.css')}}">

<!-- Main Style Css -->
<link rel="stylesheet" href="{{asset('course_assets/assets/css/sign.css')}}">

<!-- Normalize CSS -->


<title>Certification </title>
</head>--}}
{{--<body>--}}
{{--<!-- Start Navigation -->--}}
{{--<nav class="navbar navbar-default">--}}
{{--<div class="container">--}}
{{--<!-- Brand and toggle get grouped for better mobile display -->--}}
{{--<div class="navbar-header">--}}
{{--<a class="navbar-brand" href="{{url('/')}}">--}}
{{--<img alt="Brand" src="{{asset('course_assets/assets/images/logo.png')}}">--}}
{{--Any Course--}}
{{--</a>--}}
{{--</div><!-- /.navbar-header -->--}}
{{--<div class="navbar-header">--}}
{{--<a class="navbar-brand" href="{{url('/')}}">--}}
{{--<i class="fa fa-file-pdf"></i>--}}
{{--</a>--}}
{{--</div><!-- /.navbar-header -->--}}
{{--</div><!-- /.container -->--}}
{{--</nav>--}}

<!-- End Navigation -->

@section('content')
    <div class="container-fluid">

        @if ($certifications->count() > 0)

            @foreach ($certifications as $certification)
                <div class="row bg-white p-2 mb-2">
                    <div class="col-sm-8">
                        <img class="profile-pic img-rounded img-fluid"
                             src="{{asset('storage/'.$certification->course->image->file_path) }}"
                             style="width: 50px; height: 50px" width="50">
                        <a class="lead p-2"
                           href="{{route('course.certification',$certification->course['slug_'.app()->getLocale()])}}">{{$certification->course['title_'.app()->getLocale()]}}</a>

                    </div>
                    <div class="col-sm-4 text-right" style="padding-top: 12px;">
                        <a href="{{route('course.certification',[
                'course_slug'=>$certification->course['slug_'.app()->getLocale()],
                'download'=>'PDF'
                ])}}" download="{{$certification->course['title_'.app()->getLocale()].'.pdf'}}"> <i
                                    class="fa fa-download" style="font-size: 24px;"></i> </a>
                    </div>

                </div>
            @endforeach
        @else
            <div class=" bg-white p-2 py-3 lead">
                <p class="text-center text-primary mb-0">@lang('admin.not certifications exist')</p>
            </div>

        @endif



    </div>
    {{--</div>--}}
@endsection
{{--@stop--}}

