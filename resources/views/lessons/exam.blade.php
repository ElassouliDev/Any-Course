@extends('layouts.layout_lessons')
@section('title',__('course.exam'))
@push('css')
    {{--  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}
    <style>
        div#dataTableBuilder_wrapper {
            width: 100%;
        }

        .thumbnail {
            padding: 0px;
        }

        .panel {
            position: relative;
        }

        .panel > .panel-heading:after, .panel > .panel-heading:before {
            position: absolute;
            top: 11px;
            left: -16px;
            right: 100%;
            width: 0;
            height: 0;
            display: block;
            content: " ";
            border-color: transparent;
            border-style: solid solid outset;
            pointer-events: none;
        }

        .panel > .panel-heading:after {
            border-width: 7px;
            border-right-color: #f7f7f7;
            margin-top: 1px;
            margin-left: 2px;
        }

        .panel > .panel-heading:before {
            border-right-color: #ddd;
            border-width: 8px;
        }
    </style>

@endpush

@section('content')
    <style>
        body, html {
            height: 100%;
            background: #222222;
            font-family: 'Lato', sans-serif;
        }

        .center-block {
            width: 100%;
        }

        h2 {
            color: #AAAAAA;
            font-weight: normal;
        }

        .bg-for-submit-name {
            background: url('https://lh4.ggpht.com/GLT1kYMvi4oiguL9FOc1eM5q7sW0AvVJNWyBZ26iMq-BSm3Kpi9CPDR2UGoVlYrVwA=h900') fixed;
            background-size: cover;
            padding: 0;
            margin: 0;
        }

        .margin-top {
            margin-top: 270px;
        }

        .wrap {
            width: 100%;
            height: 100%;
            min-height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 99;
        }

        p.form-title {
            font-family: 'Open Sans', sans-serif;
            font-size: 20px;
            font-weight: 600;
            text-align: center;
            color: #FFFFFF;
            margin-top: 5%;
            text-transform: uppercase;
            letter-spacing: 4px;
        }

        /* form {
             width: 250px;
             margin: 0 auto;
         }
 */
        form.login input[type="text"], form.login input[type="password"] {
            width: 100%;
            margin: 0;
            padding: 5px 10px;
            background: #fff;
            border: 0;
            border-bottom: 3px solid #75ba48;
            outline: 0;
            font-size: 15px;
            font-weight: 400;
            letter-spacing: 1px;
            margin-bottom: 10px;
            color: #000;
            outline: 0;

        }

        form.login input[type="submit"] {
            width: 100%;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: 500;
            margin-top: 16px;
            outline: 0;
            cursor: pointer;
            letter-spacing: 1px;
        }

        form.login input[type="submit"]:hover {
            transition: background-color 0.5s ease;
        }

        .btn-success {
            color: #fff;
            background-color: #75ba48;
            border-color: #75ba48;
            width: 100%;
            /* font-weight: 600 !important; */
            padding: 7px 10px;
            font-size: 15px !important;
            border-radius: 0px;
            word-spacing: 4px;
            letter-spacing: 1px;

        }

        .btn-success:hover {
            color: #fff !important;
            background-color: #2FC0AE !important;
            border-color: #2FC0AE !important;
        }

        form.login label, form.login a {
            font-size: 12px;
            font-weight: 400;
            color: #FFFFFF;
        }

        form.login a {
            transition: color 0.5s ease;
        }

        form.login a:hover {
            color: #2ecc71;
        }

        .pr-wrap {
            width: 100%;
            height: 100%;
            min-height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 999;
            display: none;
        }

        .show-pass-reset {
            display: block !important;
        }

        .pass-reset {
            margin: 0 auto;
            width: 250px;
            position: relative;
            margin-top: 22%;
            z-index: 999;
            background: #FFFFFF;
            padding: 20px 15px;
        }

        .pass-reset label {
            font-size: 12px;
            font-weight: 400;
            margin-bottom: 15px;
        }

        .pass-reset input[type="email"] {
            width: 100%;
            margin: 5px 0 0 0;
            padding: 5px 10px;
            background: 0;
            border: 0;
            border-bottom: 1px solid #000000;
            outline: 0;
            font-style: italic;
            font-size: 12px;
            font-weight: 400;
            letter-spacing: 1px;
            margin-bottom: 5px;
            color: #000000;
            outline: 0;
        }

        .pass-reset input[type="submit"] {
            width: 100%;
            border: 0;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: 500;
            margin-top: 10px;
            outline: 0;
            cursor: pointer;
            letter-spacing: 1px;
        }

        /*----------quiz.css---------------*/

        .loanParamsLoader {
            top: 143px;
            margin: auto;
            position: absolute;
            right: 17%;
            width: 135%;
        }

        .question {
            background: #75ba48;
            padding: 20px;
            color: #fff;
            border-bottom-right-radius: 55px;
            border-top-left-radius: 55px;
        }

        #qid {
            margin-right: 22px;
            background-color: #ffffff;
            color: #aaaaaa;
        }

        .container ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        #quiz ul li {
            color: #AAAAAA;
            display: block;
            position: relative;
            float: left;
            width: 100%;
            height: 100px;
            border-bottom: 1px solid #111111;
        }

        #quiz ul li input[type=radio] {
            position: absolute;
            visibility: hidden;
        }

        #quiz ul li label {
            display: block;
            position: relative;
            font-weight: 300;
            font-size: 1.35em;
            padding: 25px 25px 25px 80px;
            margin: 10px auto;
            height: 30px;
            z-index: 9;
            cursor: pointer;
            -webkit-transition: all 0.25s linear;
        }

        ul li:hover label {
            color: #FFFFFF;
        }

        ul li .check {
            display: block;
            position: absolute;
            border: 5px solid #AAAAAA;
            border-radius: 100%;
            height: 30px;
            width: 30px;
            top: 30px;
            left: 20px;
            z-index: 5;
            transition: border .25s linear;
            -webkit-transition: border .25s linear;
        }

        ul li:hover .check {
            border: 5px solid #FFFFFF;
        }

        ul li .check::before {
            display: block;
            position: absolute;
            content: '';
            border-radius: 100%;
            height: 14px;
            width: 14px;
            top: 3px;
            left: 3px;
            margin: auto;
            transition: background 0.25s linear;
            -webkit-transition: background 0.25s linear;
        }

        #quiz input[type=radio]:checked ~ .check {
            border: 5px solid #00FF00;
        }

        #quiz input[type=radio]:checked ~ .check::before {
            background: #00FF00; /*attr('data-background');*/
        }

        #quiz input[type=radio]:checked ~ label {
            color: #00FF00;
        }

        #result-of-question th {
            text-align: center;
            background: #75ba48;
            color: #fff;
            padding: 18px;
            font-size: 18px;
            border: none;
        }

        #result-of-question td {
            text-align: center;
            color: #222;
            background-color: #fff;
            padding: 18px;
            font-size: 15px;
            font-weight: 600;
            border: 1px solid #75ba48;
        }

        #totalCorrect {
            color: #fff;
            background: #75ba48;
            padding: 22px 20px;
            border-radius: 1px;
            font-stretch: expanded;
            font-size: 28px;
            font-weight: bold;
            border-top-right-radius: 25px;
            border-top-left-radius: 25px;
        }

        #alert {
            /* Position fixed */
            position: fixed;
            /* Center it! */
            top: 50%;
            left: 50%;
            margin-top: -50px;
            margin-left: -100px;
        }

        /*----------riple bubble-----------------*/
        ul {
            margin: 0 auto;
        }

        /*.ink styles - the elements which will create the ripple effect. The size and position of these elements will be set by the JS code. Initially these elements will be scaled down to 0% and later animated to large fading circles on user click.*/
        .ink {
            display: inline;
            position: absolute;
            background: #75ba48;
            border-radius: 100%;
            transform: scale(0);
        }

        /*animation effect*/
        .ink.animate {
            animation: ripple 0.65s linear;
        }

        @keyframes ripple {
            /*scale the element to 250% to safely cover the entire link and fade it out*/
            100% {
                opacity: 0;
                transform: scale(2.5);
            }
        }

        /* css  review product*/
        .animated {
            -webkit-transition: height 0.2s;
            -moz-transition: height 0.2s;
            transition: height 0.2s;
        }

        .stars {
            /* margin: 20px 0;
             font-size: 24px;
             color: #d17581;*/
            margin: 0;
            font-size: 28px;
            color: #75ba48;
        }

    </style>

    {{-- strat style comment  --}}
    <style>
        .comments {
            width: 87%;
            margin: 29px auto;
            padding: 0px 10px 0px 10px;
            /*border-left: 2px solid #34495e;*/
        }

        p {
            padding: 20px;
            background: #34495e;
            color: #ecf0f1;
            font-family: tahoma;
            line-height: 1.7;
            position: relative;
        }

        p > span {
            display: block;
            padding: 5px 5px 10px 5px;
            color: #7f8c8d;
            font-style: italic;
            font-size: 13px;
        }

        p > button {
            background: #2ecc71;
            color: #fff;
            width: 100px;
            padding: 10px;
            border-radius: 2px;
            border: 0;
            font-weight: bold;
            cursor: pointer;
        }

        p:before {
            content: "";
            display: block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #2ecc71;
            top: -9px;
            left: -61px;
            position: absolute;
        }

        p:after {
            content: "";
            display: block;
            width: 0;
            height: 0;
            border-style: solid;
            border-color: #34495e #34495e transparent transparent;
            border-width: 15px;
            position: absolute;
            top: 0px;
            left: -29px;
        }

        span.stars.stars_reveiw i {
            font-size: 20px;
            margin: -3px;
        }
    </style>

    <div class="col-md-3 left-side" style="min-height:760px ">

        <div class="heading-side">
            <i class="fa fa-caret-left fa-lg"></i>
            <h5>@lang('admin.course') : {{ucfirst($course['title_'.app()->getLocale()])}} <span
                        style="float: right; color: #1d2124 ; background: white ; padding:5px 10px; border-radius: 20px;  ">@lang('course.lesson')
                    :{{count($lessons)}} </span></h5>


        </div>
        <div class="divider"></div>
        <ul class="nav nav-tabs">
            @if (count($lessons) > 0)
                @foreach($lessons as $lesson)
                    <li class="{{--@if($lesson->id == $lesson_watching->id)active @endif--}}" style="float: none">
                        <a href="{{route('course_lesson',['course_id'=>$lesson->course['slug_'.app()->getLocale()],'lesson_id'=>$lesson['slug_'.app()->getLocale()]])}}">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                                    {{++$loop->index}}
                                    .{{$lesson['title_'.app()->getLocale()]}}
                                    @if(!empty($lesson->student_watch_lesson) && $lesson->student_watch_lesson->count()>0 )
                                        {{--{{dd($lesson->student_watch_lesson->first()->is_completed)}}--}}
                                        @if($lesson->student_watch_lesson->first()->is_completed == 1)
                                            <i class="fa fa-star text-light" style="color: white"></i>
                                        @else
                                            <i class="fa fa-hourglass-start" style="color: white"></i>
                                        @endif
                                    @endif
                                </label>


                            </div>
                        </a>
                    </li>
                @endforeach

            @else
                <li style="float: none">

                    <div class="radio">
                        <label>
                            @lang('course.no_lessons')
                        </label>

                    </div>
                </li>

            @endif

        </ul>
        @if (count($lessons) > 0)
            <ul class="list-unstyled">
                @if (count($lessons) > 0)
                    <li style="float: none" class="active">
                        <a href="{{route('course.exam',$course['slug_'.app()->getLocale()])}}">
                            <div class="radio">
                                <label>
                                    {{__('course.exam')}}

                                </label>


                            </div>
                        </a>
                    </li>
                    <li class="course-certification-link"
                        style="float: none; @if(!$user_has_certification) display: none;  @endif ">
                        <a href="{{route('course.certification',$course['slug_'.app()->getLocale()])}}">
                            <div class="radio">
                                <label>

                                    {{__('course.certificate')}}
                                </label>
                            </div>
                        </a>
                    </li>


                @endif

            </ul>
        @endif
    </div>

    <div class="col-md-9">
        <div class="show-videos">
            <div class="tab-content">
                <button type="button" class="btn btn-primary btn_action_review" data-toggle="modal" data-target="#new">
                    {!! (isset($user_review ) && !empty($user_review ))?
                    __('course.edit_review').'&ensp; <i class="fa fa-pencil" style="font-size: 11px;"></i>':
                    __('course.new_review').'&ensp; <i class="fa fa-plus" style="font-size: 11px;"></i>'
                    !!}


                </button>

                {{-- view course review by user --}}
                {{-- <div class="review_content">
                     @if(isset($user_review ) && !empty($user_review ))
                         <div class="comments">
                             <p class="lead">
                                 {{$user_comment_review->content}}
                                 <span class="stars stars_reveiw" style="padding: 0; margin: -9px 3px;">
                               <i class="glyphicon .glyphicon-star-empty {{$user_review->rating>0?'glyphicon-star':'glyphicon-star-empty'}}"></i>
                               <i class="glyphicon .glyphicon-star-empty {{$user_review->rating>1?'glyphicon-star':'glyphicon-star-empty'}}"></i>
                               <i class="glyphicon .glyphicon-star-empty {{$user_review->rating>2?'glyphicon-star':'glyphicon-star-empty'}}"></i>
                               <i class="glyphicon .glyphicon-star-empty {{$user_review->rating>3?'glyphicon-star':'glyphicon-star-empty'}}"></i>
                               <i class="glyphicon .glyphicon-star-empty {{$user_review->rating>4?'glyphicon-star':'glyphicon-star-empty'}}"></i>
                         </span>
                                 <span>{{Carbon\Carbon::parse($user_comment_review->created_at)->diffForHumans()}}</span>

                             </p>

                         </div>

                     @endif
                 </div>--}}
                @if (isset($course->exams)&& count($course->exams)>0)
                    <div class="row question-content"
                         style="{{isset($user_review)&&!empty($user_review)?'':'display:none'}} "><br><br>
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="loader">
                                <div class="col-xs-3 col-xs-offset-5">
                                    <div id="loadbar" style="display: none;">
                                        <img src="https://8finatics.s3.amazonaws.com/static/reload_emi.gif"
                                             alt="Loading" class="center-block loanParamsLoader" style="">
                                    </div>
                                </div>

                                <div id="quiz">


                                    <div class="question">
                                        <h3><span class="label label-warning" id="qid">1</span>

                                            <span id="question"> {{$course->exams->first()['title_'.app()->getLocale()]}}</span>
                                        </h3>
                                    </div>
                                    <ul>

                                        @foreach($course->exams->first()->option_exam as $option)
                                            <li>
                                                <input type="radio" id="option{{++$loop->index}}" name="selector"
                                                       value="{{$option['value_'.app()->getLocale()]}}">
                                                <label for="option{{$loop->index}}"
                                                       class="element-animation">{{$option['value_'.app()->getLocale()]}}</label>
                                                <div class="check"></div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="text-muted">
                                <span id="answer"></span>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div id="result-of-question" class="pulse animated" style="display: none;">
                                <span id="totalCorrect" class="pull-right"></span>
                                <table class="table table-hover table-responsive">
                                    <thead>
                                    <tr>
                                        <th>@lang('course.Question No.')</th>
                                        <th>@lang('course.Our answer')</th>
                                        <th>@lang('course.Your answer')</th>
                                        <th>@lang('course.Result')</th>
                                    </tr>
                                    </thead>
                                    <tbody id="quizResult">
                                    {{--
                                                                        @foreach()
                                    --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    <div id="menu1" class="tab-pane fade in active ">
                        <h3 class="text-center">@lang('course.soon')</h3>
                        <a href="#"><span class="back">@lang('course.feed_back')</span></a>
                        <div class="video text-center">
                        </div>
                    </div>
                @endif

            </div>


        </div>
    </div>
    </div>
    <form method="post" enctype="multipart/form-data" id="AnswerQuestion"
          action="{{route('course.exam',$course['slug_'.app()->getLocale()])}}">
        @csrf
        <input type="hidden" name="data_answer" multiple value="">
    </form>
    <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{(isset($user_review ) && !empty($user_review ))?__('course.edit_review'):__('course.new_review')}}  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="post-review-box">
                        <div class="col-md-12">
                            <form accept-charset="UTF-8"
                                  action="{{route('course.review',$course['slug_'.app()->getLocale()])}}" method="post">
                                @csrf
                                <div class="form-group">
                                <textarea name="comment" class="form-control animated text-light w-100" id="new-review"
                                          placeholder="Enter your review here..." rows="5"
                                          style="color:#75ba48;resize: none">{{(isset($user_review ) && !empty($user_review ))?$user_comment_review->content:''}}</textarea>
                                </div>
                                <input id="ratings-hidden" name="rating" type="hidden">
                                <div class="text-right">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="stars starrr text-left" data-rating="0"></div>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <button type="reset" class="btn btn-secondary"
                                                    data-dismiss="modal">@lang('admin.cancel')</button>
                                            <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop
@push('js')

    <script type="text/javascript">


        $(document).on('click', '[data-action="new"]', function () {
            $('#new').modal('show');
        });


        /*
                $(document).on('click', '[data-action="show"]', function () {
                    notifications.loading.show();
                    $('#show').remove();
                    $('.modal-backdrop.fade.show').remove();

                    var url = $(this).attr('data-link'),
                        request = $.ajax({
                            url: url,
                            method: "get",
                            data: [],
                            dataType: "json",
                            cache: false,
                            contentType: false,
                            processData: false
                        });
                    request.done(function (response) {
                         $('html').append(response.show);
                        $('#show').modal('show');

                        $('.question-content').show();
                        // $('#growls').remove();

                        // http.success(response, false);
                    });
                });
        */

    </script>


    {{--// exam script--}}
    <script>
        /*--------loader script-----------*/

        $(document).on('submit', 'form#AnswerQuestion', function (event) {
            event.preventDefault();
            $this = $(this);
            url = $(this).attr('action');
            $.post(url, $(this).serialize(), function (response) {
                $('.course-certification-link').show();
            });
        });

        $(function () {
            var loading = $('#loadbar').hide();
            $(document)
                .ajaxStart(function () {
                    loading.show();
                }).ajaxStop(function () {
                loading.hide();
            });

            var questionNo = 0;
            var correctCount = 0;
            var q = [

                            @foreach($course->exams as $exam)
                    {
                        'Q': '{{$exam['title_'.app()->getLocale()]}}?',
                        'ID': '{{$exam->id}}',
                        'A': '{{$exam->option_exam->where('is_correct',true)->first()['value_'.app()->getLocale()]}}',
                        'C': [
                            @foreach($exam->option_exam as $option)
                                '{{$option['value_'.app()->getLocale()]}}',
                            @endforeach
                        ]
                    }
                    ,

                        @endforeach

                ]
            ;


            $(document.body).on('click', "label.element-animation", function (e) {
                //ripple start
                var parent, ink, d, x, y;
                parent = $(this);
                if (parent.find(".ink").length == 0)
                    parent.prepend("<span class='ink'></span>");

                ink = parent.find(".ink");
                ink.removeClass("animate");

                if (!ink.height() && !ink.width()) {
                    d = Math.max(parent.outerWidth(), parent.outerHeight());
                    ink.css({height: "100px", width: "100px"});
                }

                x = e.pageX - parent.offset().left - ink.width() / 2;
                y = e.pageY - parent.offset().top - ink.height() / 2;

                ink.css({top: y + 'px', left: x + 'px'}).addClass("animate");
                //ripple end

                var choice = $(this).parent().find('input:radio').val();
                console.log(choice);
                var anscheck = $(this).checking(questionNo, choice);//$( "#answer" ).html(  );
                q[questionNo].UC = choice;
                if (anscheck) {
                    correctCount++;
                    q[questionNo].result = "Correct";
                } else {
                    q[questionNo].result = "Incorrect";
                }

                console.log("CorrectCount:" + correctCount);
                setTimeout(function () {
                    $('#loadbar').show();
                    $('#quiz').fadeOut();
                    questionNo++;
                    if ((questionNo + 1) > q.length) {
                        alert("Quiz completed, Now click ok to get your answer");
                        var answerExam = [];


                        $('label.element-animation').unbind('click');
                        setTimeout(function () {
                            var toAppend = '';

                            $.each(q, function (i, a) {
                                option = [];
                                option.push(a.ID);
                                option.push(a.UC);
                                answerExam.push(option);
                                toAppend += '<tr>';
                                toAppend += '<td>' + (i + 1) + '</td>';
                                toAppend += '<td>' + a.A + '</td>';
                                toAppend += '<td>' + a.UC + '</td>';
                                toAppend += '<td>' + a.result + '</td>';
                                toAppend += '</tr>'
                            });
                            $('#quizResult').html(toAppend);
                            $('#totalCorrect').html("Total correct: " + correctCount);
                            $('#quizResult').show();
                            $('#loadbar').fadeOut();
                            $('#result-of-question').show();
                            $('#graph-result').show();
                            $('#AnswerQuestion [name=data_answer]').val(answerExam);
                            $('form#AnswerQuestion').submit();


                        }, 1000);

                        /*
                        */
                    } else {
                        $('#qid').html(questionNo + 1);
                        $('#quiz input:radio').prop('checked', false);
                        setTimeout(function () {
                            $('#quiz').show();
                            $('#loadbar').fadeOut();
                        }, 1500);
                        $('#question').html(q[questionNo].Q);
                        $('#option1').parent().find('label').html(q[questionNo].C[0]);
                        $('#option2').parent().find('label').html(q[questionNo].C[1]);
                        $('#option3').parent().find('label').html(q[questionNo].C[2]);
                        $('#option4').parent().find('label').html(q[questionNo].C[3]);
                        $('#option1').val(q[questionNo].C[0]);
                        $('#option2').val(q[questionNo].C[1]);
                        $('#option3').val(q[questionNo].C[2]);
                        $('#option4').val(q[questionNo].C[3]);
                    }
                }, 1000);
            });


            $.fn.checking = function (qstn, ck) {
                var ans = q[questionNo].A;
                if (ck != ans)
                    return false;
                else
                    return true;
            };

// chartMake();
            /*
                        function chartMake() {

                            var chart = AmCharts.makeChart("chartdiv",
                                {
                                    "type": "serial",
                                    "theme": "dark",
                                    "dataProvider": [{
                                        "name": "Correct",
                                        "points": correctCount,
                                        "color": "#00FF00",
                                        "bullet": "http://i2.wp.com/img2.wikia.nocookie.net/__cb20131006005440/strategy-empires/images/8/8e/Check_mark_green.png?w=250"
                                    }, {
                                        "name": "Incorrect",
                                        "points": q.length - correctCount,
                                        "color": "red",
                                        "bullet": "http://4vector.com/i/free-vector-x-wrong-cross-no-clip-art_103115_X_Wrong_Cross_No_clip_art_medium.png"
                                    }],
                                    "valueAxes": [{
                                        "maximum": q.length,
                                        "minimum": 0,
                                        "axisAlpha": 0,
                                        "dashLength": 4,
                                        "position": "left"
                                    }],
                                    "startDuration": 1,
                                    "graphs": [{
                                        "balloonText": "<span style='font-size:13px;'>[[category]]: <b>[[value]]</b></span>",
                                        "bulletOffset": 10,
                                        "bulletSize": 52,
                                        "colorField": "color",
                                        "cornerRadiusTop": 8,
                                        "customBulletField": "bullet",
                                        "fillAlphas": 0.8,
                                        "lineAlpha": 0,
                                        "type": "column",
                                        "valueField": "points"
                                    }],
                                    "marginTop": 0,
                                    "marginRight": 0,
                                    "marginLeft": 0,
                                    "marginBottom": 0,
                                    "autoMargins": false,
                                    "categoryField": "name",
                                    "categoryAxis": {
                                        "axisAlpha": 0,
                                        "gridAlpha": 0,
                                        "inside": true,
                                        "tickLength": 0
                                    }
                                });
                        }
            */
        });

    </script>

    {{-- script review --}}
    <script>
        (function (e) {
            var t, o = {className: "autosizejs", append: "", callback: !1, resizeDelay: 10},
                i = '<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',
                n = ["fontFamily", "fontSize", "fontWeight", "fontStyle", "letterSpacing", "textTransform", "wordSpacing", "textIndent"],
                s = e(i).data("autosize", !0)[0];
            s.style.lineHeight = "99px", "99px" === e(s).css("lineHeight") && n.push("lineHeight"), s.style.lineHeight = "", e.fn.autosize = function (i) {
                return this.length ? (i = e.extend({}, o, i || {}), s.parentNode !== document.body && e(document.body).append(s), this.each(function () {
                    function o() {
                        var t, o;
                        "getComputedStyle" in window ? (t = window.getComputedStyle(u, null), o = u.getBoundingClientRect().width, e.each(["paddingLeft", "paddingRight", "borderLeftWidth", "borderRightWidth"], function (e, i) {
                            o -= parseInt(t[i], 10)
                        }), s.style.width = o + "px") : s.style.width = Math.max(p.width(), 0) + "px"
                    }

                    function a() {
                        var a = {};
                        if (t = u, s.className = i.className, d = parseInt(p.css("maxHeight"), 10), e.each(n, function (e, t) {
                            a[t] = p.css(t)
                        }), e(s).css(a), o(), window.chrome) {
                            var r = u.style.width;
                            u.style.width = "0px", u.offsetWidth, u.style.width = r
                        }
                    }

                    function r() {
                        var e, n;
                        t !== u ? a() : o(), s.value = u.value + i.append, s.style.overflowY = u.style.overflowY, n = parseInt(u.style.height, 10), s.scrollTop = 0, s.scrollTop = 9e4, e = s.scrollTop, d && e > d ? (u.style.overflowY = "scroll", e = d) : (u.style.overflowY = "hidden", c > e && (e = c)), e += w, n !== e && (u.style.height = e + "px", f && i.callback.call(u, u))
                    }

                    function l() {
                        clearTimeout(h), h = setTimeout(function () {
                            var e = p.width();
                            e !== g && (g = e, r())
                        }, parseInt(i.resizeDelay, 10))
                    }

                    var d, c, h, u = this, p = e(u), w = 0, f = e.isFunction(i.callback), z = {
                        height: u.style.height,
                        overflow: u.style.overflow,
                        overflowY: u.style.overflowY,
                        wordWrap: u.style.wordWrap,
                        resize: u.style.resize
                    }, g = p.width();
                    p.data("autosize") || (p.data("autosize", !0), ("border-box" === p.css("box-sizing") || "border-box" === p.css("-moz-box-sizing") || "border-box" === p.css("-webkit-box-sizing")) && (w = p.outerHeight() - p.height()), c = Math.max(parseInt(p.css("minHeight"), 10) - w || 0, p.height()), p.css({
                        overflow: "hidden",
                        overflowY: "hidden",
                        wordWrap: "break-word",
                        resize: "none" === p.css("resize") || "vertical" === p.css("resize") ? "none" : "horizontal"
                    }), "onpropertychange" in u ? "oninput" in u ? p.on("input.autosize keyup.autosize", r) : p.on("propertychange.autosize", function () {
                        "value" === event.propertyName && r()
                    }) : p.on("input.autosize", r), i.resizeDelay !== !1 && e(window).on("resize.autosize", l), p.on("autosize.resize", r), p.on("autosize.resizeIncludeStyle", function () {
                        t = null, r()
                    }), p.on("autosize.destroy", function () {
                        t = null, clearTimeout(h), e(window).off("resize", l), p.off("autosize").off(".autosize").css(z).removeData("autosize")
                    }), r())
                })) : this
            }
        })(window.jQuery || window.$);

        var __slice = [].slice;
        (function (e, t) {
            var n;
            n = function () {
                function t(t, n) {
                    var r, i, s, o = this;
                    this.options = e.extend({}, this.defaults, n);
                    this.$el = t;
                    s = this.defaults;
                    for (r in s) {
                        i = s[r];
                        if (this.$el.data(r) != null) {
                            this.options[r] = this.$el.data(r)
                        }
                    }
                    this.createStars();
                    this.syncRating();
                    this.$el.on("mouseover.starrr", "span", function (e) {
                        return o.syncRating(o.$el.find("span").index(e.currentTarget) + 1)
                    });
                    this.$el.on("mouseout.starrr", function () {
                        return o.syncRating()
                    });
                    this.$el.on("click.starrr", "span", function (e) {
                        return o.setRating(o.$el.find("span").index(e.currentTarget) + 1)
                    });
                    this.$el.on("starrr:change", this.options.change)
                }

                t.prototype.defaults = {
                    rating: void 0, numStars: 5, change: function (e, t) {
                    }
                };
                t.prototype.createStars = function () {
                    var e, t, n;
                    n = [];
                    for (e = 1, t = this.options.numStars; 1 <= t ? e <= t : e >= t; 1 <= t ? e++ : e--) {
                        n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))
                    }
                    return n
                };
                t.prototype.setRating = function (e) {
                    if (this.options.rating === e) {
                        e = void 0
                    }
                    this.options.rating = e;
                    this.syncRating();
                    return this.$el.trigger("starrr:change", e)
                };
                t.prototype.syncRating = function (e) {
                    var t, n, r, i;
                    e || (e = this.options.rating);
                    if (e) {
                        for (t = n = 0, i = e - 1; 0 <= i ? n <= i : n >= i; t = 0 <= i ? ++n : --n) {
                            this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")
                        }
                    }
                    if (e && e < 5) {
                        for (t = r = e; e <= 4 ? r <= 4 : r >= 4; t = e <= 4 ? ++r : --r) {
                            this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")
                        }
                    }
                    if (!e) {
                        return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")
                    }
                };
                return t
            }();
            return e.fn.extend({
                starrr: function () {
                    var t, r;
                    r = arguments[0], t = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
                    return this.each(function () {
                        var i;
                        i = e(this).data("star-rating");
                        if (!i) {
                            e(this).data("star-rating", i = new n(e(this), r))
                        }
                        if (typeof r === "string") {
                            return i[r].apply(i, t)
                        }
                    })
                }
            })
        })(window.jQuery, window);
        $(function () {
            return $(".starrr").starrr()
        })

        $(function () {

            $('#new-review').autosize({append: "\n"});

            var reviewBox = $('#post-review-box');
            var newReview = $('#new-review');
            var openReviewBtn = $('#open-review-box');
            var closeReviewBtn = $('#close-review-box');
            var ratingsField = $('#ratings-hidden');

            openReviewBtn.click(function (e) {
                reviewBox.slideDown(400, function () {
                    $('#new-review').trigger('autosize.resize');
                    newReview.focus();
                });
                openReviewBtn.fadeOut(100);
                closeReviewBtn.show();
            });

            closeReviewBtn.click(function (e) {
                e.preventDefault();
                reviewBox.slideUp(300, function () {
                    newReview.focus();
                    openReviewBtn.fadeIn(200);
                });
                closeReviewBtn.hide();

            });

            $('.starrr').on('starrr:change', function (e, value) {
                ratingsField.val(value);
            });
        });


        @if(isset($user_review ) && !empty($user_review ))
        $(document).ready(function () {
            $('.stars.starrr span:eq({{$user_review->rating-1}})').delay(4000).click();

        });


        @endif


        $(document).on('submit', '#new form', function (event) {
            event.preventDefault();
            $this = $(this);
            data = $($this).serialize();
            url = $($this).attr('action');
            $.post(url, data, function (response) {
                $rating = $($this).find('[name=rating]').val();
                /*  $('.review_content').html('<div class="comments">' +
                      '<p class="lead">' +
                      response.comment.content +
                      '<span class="stars stars_reveiw" style="padding: 0; margin: -9px 3px;">\n' +
                      '<i class="glyphicon .glyphicon-star-empty ' + ($rating > 0 ? 'glyphicon-star' : 'glyphicon-star-empty') + '"></i>' +
                      '<i class="glyphicon .glyphicon-star-empty ' + ($rating > 1 ? 'glyphicon-star' : 'glyphicon-star-empty') + '"></i>' +
                      '<i class="glyphicon .glyphicon-star-empty ' + ($rating > 2 ? 'glyphicon-star' : 'glyphicon-star-empty') + '"></i>' +
                      '<i class="glyphicon .glyphicon-star-empty ' + ($rating > 3 ? 'glyphicon-star' : 'glyphicon-star-empty') + '"></i>' +
                      '<i class="glyphicon .glyphicon-star-empty ' + ($rating > 4 ? 'glyphicon-star' : 'glyphicon-star-empty') + '"></i>' +
                      '</span>' +
                      '<span>' + response.comment.date + '</span>' +
                      '</p>' +
                      '</div>');*/
                $("#new").modal('hide');
                $(".question-content").show();
                $("#exampleModalLabel").text('@lang('course.edit_review')');
                $(".btn_action_review").html(
                    '@lang('course.edit_review')' + '&ensp; <i class="fa fa-pencil" style="font-size: 11px;"></i>'
                );

            });


        })
    </script>
@endpush
