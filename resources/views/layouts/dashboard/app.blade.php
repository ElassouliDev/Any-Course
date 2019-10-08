<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{@$site_title}}</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {{--<!-- Bootstrap 3.3.7 -->--}}
    <link rel="shortcut icon" href="{{ url(@$icon)}}"/>

    <link rel="stylesheet" href="{{ mix('css/dashboard.css') }}">

    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ mix('css/dashboard-rtl.css') }}">

        <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome-rtl.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">


        <style>
            body, h1, h2, h3, h4, h5, h6 {
                font-family: 'Cairo', sans-serif !important;
            }
        </style>
    @else
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ mix('css/dashboard-ltr.css') }}">

    @endif
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Pusher.logToConsole = true;

        var pusher = new Pusher('3154f7166f89b46a4e19', {
            cluster: 'ap2',
            forceTLS: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function (data) {
            var result = JSON.parse(JSON.stringify(data));
            console.log(result);
            url = "{{url('dashboard/notifications')}}" + '/' + result.course.user_id;
            $.get(url, function (response) {
                console.table(response);
                link_en = "{{url('course')}}" + '/' + result.course.slug_en + '/?read=' + response.data.id;
                link_ar = "{{url('course')}}" + '/' + result.course.slug_ar + '/?read=' + response.data.id;
                var notifcations = $('#notifcations ul .menu');
                notifcations.prepend("<li>" +
                    @if(app()->getLocale() == 'en')
                        "<a href='" + link_en + "'>" + result.course.message_en + "</a>" +
                    @else
                        "<a href='" + link_ar + "'>" + result.course.message_ar + "</a>" + @endif


                        +"</li>");
            });


            // alert(JSON.stringify(data));
        });
    </script>

    @stack('css')
    <style>
        .mr-2 {
            margin-right: 5px;
        }

        .loader {
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #367FA9;
            width: 60px;
            height: 60px;
            -webkit-animation: spin 1s linear infinite; /* Safari */
            animation: spin 1s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

    </style>
    {{--<!-- jQuery 3 -->--}}
    <script src="{{ asset('dashboard_files/js/jquery.min.js') }}"></script>

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>

    {{--morris--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/morris/morris.css') }}">

    {{--<!-- iCheck -->--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/icheck/all.css') }}">

    {{--html in  ie--}}
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <header class="main-header">

        {{--<!-- Logo -->--}}
        <a href="{{ route('dashboard.index') }}" class="logo">
            {{--<!-- mini logo for sidebar mini 50x50 pixels -->--}}
            <span class="logo-mini"><b>{{$site_title}}</b></span>
            <span class="logo-lg"><b>{{$site_title}}</b></span>
        </a>

        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- Messages: style can be found in dropdown.less-->
{{--                    <li class="dropdown messages-menu">--}}
{{--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
{{--                            <i class="fa fa-envelope-o"></i>--}}
{{--                            <span class="label label-success">4</span>--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li class="header">You have 4 messages</li>--}}
{{--                            <li>--}}
{{--                                <!-- inner menu: contains the actual data -->--}}
{{--                                <ul class="menu">--}}
{{--                                    <li><!-- start message -->--}}
{{--                                        <a href="#">--}}
{{--                                            <div class="pull-left">--}}
{{--                                                <img--}}
{{--                                                    src="{{isset(auth()->user()->image['file_path']) ? url('storage/'.auth()->user()->image['file_path']) : 'https://ssl.gstatic.com/accounts/ui/avatar_2x.png'}}"--}}
{{--                                                    class="img-circle" alt="User Image">--}}
{{--                                            </div>--}}
{{--                                            <h4>--}}
{{--                                                Support Team--}}
{{--                                                <small>--}}
{{--                                                    <i class="fa fa-clock-o"></i> 5 mins--}}
{{--                                                </small>--}}
{{--                                            </h4>--}}
{{--                                            <p>Why not buy a new awesome theme?</p>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li class="footer">--}}
{{--                                <a href="#">See All Messages</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

                    {{--<!-- Notifications: style can be found in dropdown.less -->--}}
                    <li class="dropdown notifications-menu dropdown-notifications " id="notifcations">

                        <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
                            <i data-count="0" class="glyphicon glyphicon-bell notification-icon fa fa-bell-o"></i>
                            <span class="label label-warning"><span
                                    class="notif-count">{{count(auth()->user()->unreadNotifications)}}</span></span>
                        </a>
                        <ul class="dropdown-menu ">
                            <li class="header">@lang('admin.You have') (<span
                                    class="notif-count">{{count(auth()->user()->unreadNotifications)}}</span>)
                                notifications
                            </li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    @foreach(auth()->user()->unreadNotifications as $notification)
                                        <li>
                                            <a href="{{url($notification->data['url_'.app()->getLocale()].'?read='.$notification->id)}}">{{$notification->data['message_'.app()->getLocale()]}}

                                                    <small class="label label-danger"><i
                                                            class="fa fa-clock-o"></i>{{Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}
                                                    </small>

                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="{{route('dashboard.notifications.index')}}">@lang('admin.View all')</a>
                            </li>
                        </ul>
                    </li>

                    {{--<!-- Tasks: style can be found in dropdown.less -->--}}
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-flag-o"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                {{--<!-- inner menu: contains the actual data -->--}}
                                <ul class="menu">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li>
                                            <a rel="alternate" hreflang="{{ $localeCode }}"
                                               href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                {{ $properties['native'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>

                    {{--<!-- User Account: style can be found in dropdown.less -->--}}
                    <li class="dropdown user user-menu">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img
                                src="{{isset(auth()->user()->image['file_path']) ? url('storage/'.auth()->user()->image['file_path']) : 'https://ssl.gstatic.com/accounts/ui/avatar_2x.png'}}"
                                class="user-image" alt="User Image">
                            <span
                                class="hidden-xs">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                        </a>
                        <ul class="dropdown-menu">

                            {{--<!-- User image -->--}}
                            <li class="user-header">
                                <img
                                    src="{{isset(auth()->user()->image['file_path']) ? url('storage/'.auth()->user()->image['file_path']) : 'https://ssl.gstatic.com/accounts/ui/avatar_2x.png'}}"
                                    class="img-circle" alt="User Image">

                                <p>
                                    {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
                            </li>

                            {{--<!-- Menu Footer-->--}}
                            <li class="user-footer">


                                <a href="{{ route('dashboard.users.profile',auth()->user()->id)}}"
                                   class="btn btn-default btn-flat">@lang('admin.profile')</a>


                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">@lang('admin.logout')</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>

                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

    </header>

    @include('layouts.dashboard._aside')

    @yield('content')

    @include('partials._session')

    <footer class="main-footer text-center">
        <div class="pull-right hidden-xs">
            <b>@lang('admin.version')</b> {{$site_version}}
        </div>
        <strong class="">
            {{$site_copyright}}
        </strong>
    </footer>

</div><!-- end of wrapper -->

{{--<!-- Bootstrap 3.3.7 -->--}}
<script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>

{{--icheck--}}
<script src="{{ asset('dashboard_files/plugins/icheck/icheck.min.js') }}"></script>

{{--<!-- FastClick -->--}}
<script src="{{ asset('dashboard_files/js/fastclick.js') }}"></script>

{{--<!-- AdminLTE App -->--}}
<script src="{{ asset('dashboard_files/js/adminlte.min.js') }}"></script>

{{--ckeditor standard--}}
<script src="{{ asset('dashboard_files/plugins/ckeditor/ckeditor.js') }}"></script>

{{--jquery number--}}
<script src="{{ asset('dashboard_files/js/jquery.number.min.js') }}"></script>

{{--print this--}}
<script src="{{ asset('dashboard_files/js/printThis.js') }}"></script>

{{--morris --}}
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('dashboard_files/plugins/morris/morris.min.js') }}"></script>

{{--custom js--}}
<script src="{{ asset('dashboard_files/js/custom/image_preview.js') }}"></script>
<script src="{{ asset('dashboard_files/js/custom/order.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
<script>
    $(document).ready(function () {

        $('.sidebar-menu').tree();

        //icheck
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });

        //delete
        $('.delete').click(function (e) {

            var that = $(this)

            e.preventDefault();

            var n = new Noty({
                text: "@lang('admin.confirm_delete')",
                type: "warning",
                killer: true,
                buttons: [
                    Noty.button("@lang('admin.yes')", 'btn btn-success mr-2', function () {
                        that.closest('form').submit();
                    }),

                    Noty.button("@lang('admin.no')", 'btn btn-primary mr-2', function () {
                        n.close();
                    })
                ]
            });

            n.show();

        });//end of delete

        // // image preview
        // $(".image").change(function () {
        //
        //     if (this.files && this.files[0]) {
        //         var reader = new FileReader();
        //
        //         reader.onload = function (e) {
        //             $('.image-preview').attr('src', e.target.result);
        //         }
        //
        //         reader.readAsDataURL(this.files[0]);
        //     }
        //
        // });

        CKEDITOR.config.language = "{{ app()->getLocale() }}";

    });//end of ready

</script>
<script src="//parsleyjs.org/dist/parsley.js"></script>
@stack('js')
</body>
</html>
