@extends('layouts.layout_lessons')
@push('css')
    <style>
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

    <div class="col-md-3 left-side" style="min-height:760px ">

        <div class="heading-side">
            <i class="fa fa-caret-left fa-lg"></i>
            <h5>@lang('course.lesson') 1 :</h5>
            <p class="my-3" style="margin-top: 15px;"> Why Responsive
            <p>


        </div>
        <div class="divider"></div>
        <ul class="nav nav-tabs">
            @if (count($lessons) > 0)
                @foreach($lessons as $lesson)
                    <li class="@if($lesson->id == $lesson_watching->id)active @endif" style="float: none">
                        <a href="@if($lesson->id != $lesson_watching->id){{route('course_lesson',['course_id'=>$lesson->course_id,'lesson_id'=>$lesson->id])}}@else # @endif">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1"
                                           @if($lesson->id == $lesson_watching->id)checked @endif >
                                    {{++$loop->index}}
                                    .{{$lesson['title_'.app()->getLocale()]}}
                                </label>

                                <i class="fa fa-star text-light" style="color: white"></i>
                                <i class="fa fa-hourglass-start" style="color: white"></i>
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
                    </a>
                </li>

            @endif

        </ul>

    </div>

    <div class="col-md-9">
        <div class="show-videos">
            <div class="tab-content">
                {{--    <div id="home" class="tab-pane fade in active">
                        <h3 class="text-center">First Lesson</h3>
                        <a href="#"><span class="back">@lang('course.feed_back')</span></a>
                        <div class="video text-center">
                            <iframe width="560" height="420" src="https://www.youtube.com/embed/HdSaxRtNxAM"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </div>
                    </div>--}}
                @if (isset($lesson_watching)&& !empty($lesson_watching))
                    <div id="menu1" class="tab-pane fade in active ">
                        <h3 class="text-center">{{$lesson_watching['title_'.app()->getLocale()]}}</h3>
                        <a href="{{route('list_question',$lesson_watching->id)}}"><span
                                    class="back">@lang('course.feed_back')</span></a>
                        <div class="video text-center">

                            <iframe id="existing-iframe-example"
                                    width="560" height="420"
                                    src="{{$lesson_watching->file->file_path}}"
                                    frameborder="0"
                                    style="border: solid 4px #37474F"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                            ></iframe>
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

            <div class="container" style=" margin-top: 50px">
                @if (isset($lesson->comment)&& !empty($lesson->comment))
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#new">@lang('course.new_comment')</button>
                @foreach ($lesson->comment as $comment)

                    <div class="row">
                        <div class="col-sm-1">
                            <div class="thumbnail">
                                <img class="img-responsive user-photo"
                                     src="{{isset($comment->user->image()->file_path) ? url('storage/'.$comment->user->image()->file_path) :'https://ssl.gstatic.com/accounts/ui/avatar_2x.png'}}">
                            </div><!-- /thumbnail -->
                        </div><!-- /col-sm-1 -->

                        <div class="col-sm-5">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong>{{$comment->user->first_name.' '.$comment->user->last_name}}</strong> <span
                                            class="text-muted">commented 5 days ago</span>
                                </div>
                                <div class="panel-body">
                                    {{$comment->content}}
                                </div><!-- /panel-body -->
                            </div><!-- /panel panel-default -->
                        </div><!-- /col-sm-5 -->

                    </div>
                @endforeach
                    @endif

            </div>


            <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">@lang('course.new_comment')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{route('new_comment')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="content" class="col-form-label">@lang('course.content'):</label>
                                    <textarea class="form-control" rows="4" name="content" id="content"
                                              required></textarea>
                                    <input type="hidden" name='lesson_id' value="{{isset($lesson->id) ? $lesson->id : ''}}">

                                </div>
                                <div class="form-group">
                                    <button type="reset" class="btn btn-secondary"
                                            data-dismiss="modal">@lang('admin.cancel')</button>
                                    <button type="submit" class="btn btn-primary">@lang('admin.add')</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>


            {{--                <div id="menu13" class="tab-pane fade">--}}
            {{--                    <h3 class="text-center">First Lesson</h3>--}}
            {{--                    <a href="#"><span class="back">@lang('course.feed_back')</span></a>--}}
            {{--                    <div class="video text-center">--}}
            {{--                        <iframe width="560" height="420" src="https://www.youtube.com/embed/HdSaxRtNxAM"--}}
            {{--                                frameborder="0"--}}
            {{--                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"--}}
            {{--                                allowfullscreen></iframe>--}}
            {{--                    </div>--}}
            {{--                </div>---}}
        </div>
    </div>
    </div>

@stop
@push('js')
    <script>
        $(document).on('submit', '#new form', function (event) {

            event.preventDefault();
            var $this = $(this);
            // notifications.loading.show();

            var url = $(this).attr('action'),
                request = $.ajax({
                    url: url,
                    method: "post",
                    data: new FormData(this),
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false
                });
            request.done(function (response) {
                $this.find('[type="reset"]').click();
                $('#new').modal('hide');
                /*http.success(response, true);
                $('.checkAll').prop("checked", false);

                $('#dataTable').DataTable().ajax.reload();*/
            });
            request.fail(function (response, exception) {
                http.fail(JSON.parse(response.responseText), true);
            });
        });
    </script>
    <script type="text/javascript">
        /*$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
            }
        });*/
        var tag = document.createElement('script');
        tag.id = 'iframe-demo';
        tag.src = 'https://www.youtube.com/iframe_api';
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        var player;

        function onYouTubeIframeAPIReady() {
            player = new YT.Player('existing-iframe-example', {
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        function onPlayerReady(event) {
            document.getElementById('existing-iframe-example').style.borderColor = '#FF6D00';
        }

        function changeBorderColor(playerStatus) {
            var color;
            if (playerStatus == -1) {
                color = "#37474F"; // unstarted = gray
            } else if (playerStatus == 0) {
                color = "#FFFF00"; // ended = yellow
                completeWatchVideo();
            } else if (playerStatus == 1) {
                color = "#33691E"; // playing = green
                WatchVideo();
            } else if (playerStatus == 2) {
                color = "#DD2C00"; // paused = red
            } else if (playerStatus == 3) {
                color = "#AA00FF"; // buffering = purple
            } else if (playerStatus == 5) {
                color = "#FF6DOO"; // video cued = orange
            }
            if (color) {
                document.getElementById('existing-iframe-example').style.borderColor = color;
            }
        }

        function onPlayerStateChange(event) {
            changeBorderColor(event.data);
        }


        function completeWatchVideo() {

            var posted_data = "lesson_id={{isset($lesson_watching->id)?$lesson_watching->id:''}}&_token=" + $("meta[name='csrf-token']").attr("content");
            BASE_URL= "{{route('user')}}";
            $.post(BASE_URL, posted_data,
                function (response, status) {
                })
        }
        function WatchVideo() {
            var posted_data = "lesson_id={{isset($lesson_watching->id)?$lesson_watching->id:''}}&_token=" + $("meta[name='csrf-token']").attr("content");
            BASE_URL= "{{route('student.lesson.watch')}}";
            $.post(BASE_URL, posted_data,
                function (response, status) {

                })
        }

    </script>
@endpush
