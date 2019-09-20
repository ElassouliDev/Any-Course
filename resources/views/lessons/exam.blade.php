@extends('layouts.layout_lessons')
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

        form {
            width: 250px;
            margin: 0 auto;
        }

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

        #quiz  input[type=radio]:checked ~ .check {
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
                    <li class="active" style="float: none">
                        <a href="{{route('course.exam',$course['slug_'.app()->getLocale()])}}">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1"
                                           checked >
                                    {{1 + count($lessons)}}
                                    .{{__('course.exam')}}
                                    {{--@if(!empty($lesson->student_watch_lesson) && $lesson->student_watch_lesson->count()>0 )
                                        --}}{{--{{dd($lesson->student_watch_lesson->first()->is_completed)}}--}}{{--
                                        @if($lesson->student_watch_lesson->first()->is_completed == 1)
                                            <i class="fa fa-star text-light" style="color: white"></i>
                                        @else
                                            <i class="fa fa-hourglass-start" style="color: white"></i>
                                        @endif
                                    @endif--}}
                                </label>


                            </div>
                        </a>
                    </li>
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

    </div>

    <div class="col-md-9">
        <div class="show-videos">
            <div class="tab-content">

                @if (true/*isset($lesson_watching)&& !empty($lesson_watching)*/)
                    <div class="row"><br><br>
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
                                    <tbody id="quizResult"></tbody>
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
    <form method="post" enctype="multipart/form-data" id="AnswerQuestion" action="{{route('course.exam',$course['slug_'.app()->getLocale()])}}">
        @csrf
        <input type="hidden" name="data_answer" multiple value="">
    </form>
@stop
@push('js')

    <script type="text/javascript">


        $(document).on('click', '[data-action="new"]', function () {
            // resetFormProductData($('#new-product'));
            $('#new').modal('show');
        });


        //////////////// ------------------------------  create  course
        // $(document).on('submit', 'form', function (event) {
        //     event.preventDefault();
        //     var $this = $(this);
        //     notifications.loading.show();
        //
        //     var url = $(this).attr('action'),
        //         request = $.ajax({
        //             url: url,
        //             method: "post",
        //             data: new FormData(this),
        //             dataType: "json",
        //             cache: false,
        //             contentType: false,
        //             processData: false
        //         });
        //     request.done(function (response) {
        //         $this.find('[type="reset"]').click();
        //         $('.new').modal('hide');
        //         http.success(response, true);
        //         $('#dataTableBuilder').DataTable().ajax.reload();
        //     });
        //     request.fail(function (response, exception) {
        //         http.fail(JSON.parse(response.responseText), true);
        //     });
        // });
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
                $('.js-example-basic-multiple').select2();

                // $('#growls').remove();

                // http.success(response, false);
            });
            request.fail(function (response, exception) {
                // /$('#growls').remove();

                // http.fail(JSON.parse(response.responseText), true);
            });
        });

    </script>


    // exam script
    <script>
        /*--------loader script-----------*/
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
                        var answerExam= [];


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
                        $($('#option1').parent().find('label')).html(q[questionNo].C[0]);
                        $($('#option2').parent().find('label')).html(q[questionNo].C[1]);
                        $($('#option3').parent().find('label')).html(q[questionNo].C[2]);
                        $($('#option4').parent().find('label')).html(q[questionNo].C[3]);
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
@endpush
