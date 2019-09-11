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
    <link rel="stylesheet" href="{{asset('course_assets/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('course_assets/assets/css/fontawesome.min.css')}}">

    <!-- Main Style Css -->
    <link rel="stylesheet" href="{{asset('course_assets/assets/css/sign.css')}}">

    <!-- Normalize CSS -->


    <title>MyEdu</title>
</head>
<body>
<!-- Start Navigation -->
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{url('/')}}">
                <img alt="Brand" src="{{asset('course_assets/assets/images/logo.png')}}">
                MyEdu
            </a>
        </div><!-- /.navbar-header -->
    </div><!-- /.container -->
</nav>
<!-- End Navigation -->

<div class="container">

    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <!-- Nav tabs -->

                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" @if($action == 'register')class="active" @endif><a href="#signup"
                                                                                                   aria-controls="signup"
                                                                                                   role="tab"
                                                                                                   data-toggle="tab">Sign
                                Up</a></li>
                        <li role="presentation" @if($action == 'login')class="active" @endif><a href="#signin"
                                                                                                aria-controls="signin"
                                                                                                role="tab"
                                                                                                data-toggle="tab">Sign
                                In</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- Sign Up -->
                        <div role="tabpanel" class="tab-pane fade @if($action == 'register') in active @endif"
                             id="signup">
                            <h3 class="card-title text-center">Create Account</h3>
                            <form method="post" action="{{route('user.register')}}" class="form-signin text-left">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="firstName">@lang('admin.first_name')</label>
                                        <input type="text" id="first_name" class="form-control" placeholder="First Name"
                                               required autofocus>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="lastName">@lang('admin.last_name')</label>
                                        <input type="text" id="last_name" class="form-control" placeholder="Last Name"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">@lang('admin.email')</label>
                                    <input type="email" name="email" id="inputEmail" class="form-control"
                                           placeholder="Email address"
                                           required>

                                </div>
                                {{--  <div class="form-group">
                                      <label for="phone">Phone</label>
                                      <input type="text" id="phone" class="form-control" placeholder="Phone" required>
                                  </div>--}}
                                {{--<div class="form-group">
                                    <label for="dob">Date Of Birth</label>
                                    <input type="date" id="dob" class="form-control" placeholder="Date Of Birth"
                                           required>
                                </div>--}}
                                <div class="form-group">
                                    <label for="phone">Create As</label>
                                    <select name="" id="" class="form-control">
                                        <option value="student">Student</option>
                                        <option value="doctor">Doctor</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Password</label>
                                    <input type="password" name="password" id="inputPassword" class="form-control"
                                           placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <label for="checkinputPassword">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="checkinputPassword"
                                           class="form-control"
                                           placeholder="Confirm Password" required>
                                </div>

                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign Up
                                </button>
                                <!-- Seperator OR -->
                                <div class="or-separator_contain">
                                    <div class="or-separator_flex">
                                        <hr class="or-separator_line">
                                        <div class="or-separator_text">or</div>
                                        <hr class="or-separator_line">
                                    </div>
                                </div>
                                <!-- End Seperator OR -->
                                <!-- Buttons Sign Up Another -->
                                <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i
                                            class="fab fa-google mr-2"></i> Sign in with Google
                                </button>
                                <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i
                                            class="fab fa-facebook-f mr-2"></i> Sign in with Facebook
                                </button>
                            </form>
                            <!-- End Form Sign Up -->

                        </div>
                        <!-- Sing In  -->
                        <div role="tabpanel" class="tab-pane fade @if($action == 'login') in active @endif" id="signin">
                            <h3 class="card-title text-center">Sign in to your account</h3>
                            <form method="post" action="{{route('user.login')}}" class="form-signin text-left">
                                @csrf
                                <div class="form-group">
                                    <label for="inputEmail">Email </label>
                                    <input type="email" id="inputEmail" name="email" class="form-control"
                                           placeholder="Email address"
                                           required>
                                    <span class="text-danger email_error"></span>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword">Password</label>
                                    <input type="password" name="password" id="inputPassword" class="form-control"
                                           placeholder="Password" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember me?
                                    </label>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign In
                                </button>
                                <!-- Seperator OR -->
                                <div class="or-separator_contain">
                                    <div class="or-separator_flex">
                                        <hr class="or-separator_line">
                                        <div class="or-separator_text">or</div>
                                        <hr class="or-separator_line">
                                    </div>
                                </div>
                                <!-- End Seperator OR -->
                                <!-- Buttons Sign Up Another -->
                                <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i
                                            class="fab fa-google mr-2"></i> Sign in with Google
                                </button>
                                <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i
                                            class="fab fa-facebook-f mr-2"></i> Sign in with Facebook
                                </button>
                            </form>
                            <!-- End Form Sign Up -->
                        </div>
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
<!-- Bootstrap 3.4  -->
<script type="text/javascript">
    $(document).on('submit', ' form', function (event) {
        event.preventDefault();
        var $this = $(this);
        notifications.loading.show();
        $this.find('button').attr('disabled', true);
        var url = $($this).attr('action');
        $.post(url, $this.serialize(),
            function (response, status) {
                http.success(response, false, function () {

                    if (response.status == true) {
                        window.location.replace(response.url);
                    } else {

                        $('.errorEmail').text(response.message);
                        $('[type=submit]').removeAttr('disabled');

                    }
                });
            })
            .fail(function (response) {
                http.fail(JSON.parse(response.responseText), false);
                $this.find('button').attr('disabled', false);

            });


        return false;
    });


</script>


</body>
</html>
