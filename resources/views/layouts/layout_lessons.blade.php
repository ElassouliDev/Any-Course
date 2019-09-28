<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> @yield('title')- {{$site_title}} </title>
    <link href="{{asset('plugins/lib/')}}/css/emoji.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="shortcut icon" href="{{ url(@$icon)}}"/>

    <link href="{{asset('course_assets/assets/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('course_assets/assets/css/font-awesome.min.css')}}">
    {{--    <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome-rtl.min.css') }}">--}}

    <link rel="stylesheet" href="{{asset('course_assets/css/showCourse.css')}}">

    <style>
        li.active > a,
        li.active:hover > a,
        li > a {
            background: transparent !important;
            border: 0 !important;
            outline: 0 !important;
        }

        li.active > a > .radio > label,
        li:hover a .radio > label {
            color: #fff !important;
            font-weight: 800 !important
        }

        .tab-pane > h3 {
            color: #eee;
        }

        .video {
            margin-top: 50px;
        }
    </style>

    @yield('css')
</head>
<body>


<div class="show-design">
    <div class="container-fluid">
        <div class="row">


            @yield('content')


        </div>
    </div>

</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('course_assets/assets/lib/jquery/jquery.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('course_assets/assets/lib/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- <script src="js/script.js"></script> -->

{{--<script>
    $(document).ready(function () {
        $("li").focusin(function () {
            $(this).find('input').prop('checked', true);
        });
        player.addEventListener("onStateChange", function(state){
            alert();
            if(state === 0){
                // the video is end, do something here.
            }
        });
    });
</script>--}}
<script src="{{ asset('sweetalert/2.1.0/sweetalert.min.js') }}"></script>

<script src="{{ asset('resources/assets/js/globals.js') }}"></script>
<script src="{{ asset('resources/assets/js/lists.js') }}"></script>
<script src="{{ asset('resources/assets/js/notifications.js') }}"></script>
<script src="{{ asset('resources/assets/js/http.js') }}"></script>
<script src="{{ asset('resources/assets/js/editable.js') }}"></script>
@stack('js')



<!-- ** Don't forget to Add jQuery here ** -->
<script src="{{asset('plugins/lib/')}}/js/config.js"></script>
<script src="{{asset('plugins/lib/')}}/js/util.js"></script>
<script src="{{asset('plugins/lib/')}}/js/jquery.emojiarea.js"></script>
<script src="{{asset('plugins/lib/')}}/js/emoji-picker.js"></script>
</body>
</html>
