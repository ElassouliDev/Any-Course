@extends('layouts.layout')
@push('css')
    <style>
        * {
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        a {
            color: #03658c;
            text-decoration: none;
        }

        ul {
            list-style-type: none;
        }

        body {
            font-family: 'Roboto', Arial, Helvetica, Sans-serif, Verdana;
            background: #dee1e3;
        }

        /** ====================
         * Lista de Comentarios
         =======================*/
        .comments-container {
            margin: 60px auto 15px;
            width: 768px;
        }

        .comments-container h1 {
            font-size: 36px;
            color: #283035;
            font-weight: 400;
        }

        .comments-container h1 a {
            font-size: 18px;
            font-weight: 700;
        }

        .comments-list {
            margin-top: 30px;
            position: relative;
        }

        /**
         * Lineas / Detalles
         -----------------------*/
        .comments-list:before {
            content: '';
            width: 2px;
            height: 100%;
            background: #c7cacb;
            position: absolute;
            left: 32px;
            top: 0;
        }

        .comments-list:after {
            content: '';
            position: absolute;
            background: #c7cacb;
            bottom: 0;
            left: 27px;
            width: 7px;
            height: 7px;
            border: 3px solid #dee1e3;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }

        .reply-list:before, .reply-list:after {
            display: none;
        }

        .reply-list li:before {
            content: '';
            width: 60px;
            height: 2px;
            background: #c7cacb;
            position: absolute;
            top: 25px;
            left: -55px;
        }


        .comments-list li {
            margin-bottom: 15px;
            display: block;
            position: relative;
        }

        .comments-list li:after {
            content: '';
            display: block;
            clear: both;
            height: 0;
            width: 0;
        }

        .reply-list {
            padding-left: 88px;
            clear: both;
            margin-top: 15px;
        }

        /**
         * Avatar
         ---------------------------*/
        .comments-list .comment-avatar {
            width: 65px;
            height: 65px;
            position: relative;
            z-index: 99;
            float: left;
            border: 3px solid #FFF;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .comments-list .comment-avatar img {
            width: 100%;
            height: 100%;
        }

        .reply-list .comment-avatar {
            width: 50px;
            height: 50px;
        }

        .comment-main-level:after {
            content: '';
            width: 0;
            height: 0;
            display: block;
            clear: both;
        }

        /**
         * Caja del Comentario
         ---------------------------*/
        .comments-list .comment-box {
            width: 680px;
            float: right;
            position: relative;
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
        }

        .comments-list .comment-box:before, .comments-list .comment-box:after {
            content: '';
            height: 0;
            width: 0;
            position: absolute;
            display: block;
            border-width: 10px 12px 10px 0;
            border-style: solid;
            border-color: transparent #FCFCFC;
            top: 8px;
            left: -11px;
        }

        .comments-list .comment-box:before {
            border-width: 11px 13px 11px 0;
            border-color: transparent rgba(0, 0, 0, 0.05);
            left: -12px;
        }

        .reply-list .comment-box {
            width: 610px;
        }

        .comment-box .comment-head {
            background: #FCFCFC;
            padding: 10px 12px;
            border-bottom: 1px solid #E5E5E5;
            overflow: hidden;
            -webkit-border-radius: 4px 4px 0 0;
            -moz-border-radius: 4px 4px 0 0;
            border-radius: 4px 4px 0 0;
        }

        .comment-box .comment-head i {
            float: right;
            margin-left: 14px;
            position: relative;
            top: 2px;
            color: #A6A6A6;
            cursor: pointer;
            -webkit-transition: color 0.3s ease;
            -o-transition: color 0.3s ease;
            transition: color 0.3s ease;
        }

        .comment-box .comment-head i:hover {
            color: #03658c;
        }

        .comment-box .comment-name {
            color: #283035;
            font-size: 14px;
            font-weight: 700;
            float: left;
            margin-right: 10px;
        }

        .comment-box .comment-name a {
            color: #283035;
        }

        .comment-box .comment-head span {
            float: left;
            color: #999;
            font-size: 13px;
            position: relative;
            top: 1px;
        }

        .comment-box .comment-content {
            background: #FFF;
            padding: 12px;
            font-size: 15px;
            color: #595959;
            -webkit-border-radius: 0 0 4px 4px;
            -moz-border-radius: 0 0 4px 4px;
            border-radius: 0 0 4px 4px;
        }

        .comment-box .comment-name.by-author, .comment-box .comment-name.by-author a {
            color: #03658c;
        }

        .comment-box .comment-name.by-author:after {
            content: 'autor';
            background: #03658c;
            color: #FFF;
            font-size: 12px;
            padding: 3px 5px;
            font-weight: 700;
            margin-left: 10px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }

        /** =====================
         * Responsive
         ========================*/
        @media only screen and (max-width: 766px) {
            .comments-container {
                width: 480px;
            }

            .comments-list .comment-box {
                width: 390px;
            }

            .reply-list .comment-box {
                width: 320px;
            }
        }
    </style>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1"
          crossorigin="anonymous">
@endpush

@section('content')
    <div class="container ">
        <button type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#new">@lang('course.new_question')</button>


        <div class="row">
            <!-- Contenedor Principal -->
            <div class="comments-container">
                <h1>@lang('course.lesson_course') <a href="http://creaticode.com">creaticode.com</a></h1>
                @if (count($questions) > 0)
                    @foreach ($questions as $question)
                        <ul id="comments-list" class="comments-list">
                            <li>
                                <div class="comment-main-level">
                                    <!-- Avatar -->
                                    <div class="comment-avatar"><img
                                            src="{{isset($question->user->image['file_path']) ? url('storage/'.$question->user->image['file_path']) : 'https://ssl.gstatic.com/accounts/ui/avatar_2x.png'}}"
                                            alt=""></div>
                                    <!-- Contenedor del Comentario -->
                                    <div class="comment-box">
                                        <div class="comment-head">

                                            <h6 class="comment-name by-author"><a
                                                    href="#">{{$question->user->full_name()}}</a></h6>
                                            <span>{{Carbon\Carbon::parse($question->created_at)->diffForHumans()}}</span>
                                            <i class="fa fa-reply"></i>
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="comment-head h5">{{$question->title .' :'}}</div>
                                        <div class="comment-content">
                                            {!! $question->content !!}                                    </div>
                                    </div>
                                </div>
                                <!-- Respuestas de los comentarios -->
                                <ul class="comments-list reply-list">
                                    @foreach ($question->comment as $comment)

                                        <li>
                                            <!-- Avatar -->
                                            <div class="comment-avatar"><img
                                                    src="{{isset($comment->user->image['file_path']) ? url('storage/'.$comment->user->image['file_path']) : 'https://ssl.gstatic.com/accounts/ui/avatar_2x.png'}}"
                                                    alt=""></div>
                                            <!-- Contenedor del Comentario -->
                                            <div class="comment-box">
                                                <div class="comment-head">
                                                    <h6 class="comment-name"><a
                                                            href="#">{{$comment->user->first_name.' '.$comment->user->last_name}}</a>
                                                    </h6>
                                                    <span>{{Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</span>
                                                    <i class="fa fa-reply"></i>
                                                    <i class="fa fa-heart"></i>
                                                </div>

                                                <div class="comment-content">
                                                    {!! $comment->content !!}
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach


                                </ul>
                                <form method="post" action="{{route('new_comment_question')}}">
                                    @csrf
                                    @method('post')
                                    <input type="hidden" name="question_id" value="{{$question->id}}">

                                    <input class="form-control input-sm" name="content"
                                           type="text" required placeholder="{{trans('course.Type a comment')}}"  >
                                    <input type="submit"
                                           style="position: absolute; left: -9999px; width: 1px; height: 1px;"
                                           tabindex="-1"/>

                                </form>

                            </li>


                        </ul>
                    @endforeach
                @else
                    <div class="row bg-light pt-2 px-1">

                        <div class="divider"></div>
                        <div class="col-md-12 lead ">
                          {{trans('course.NO DATA')}}
                        </div>
                    </div>
                @endif
            </div>
        </div>


    </div>
    {{--    <div class="modal-body" id="new">
            <h5>@lang('course.new_question')</h5>
            <div class="row">
                <div class="col-12">
                    <label>@lang('course.content_question')</label>
                    <textarea class="w-100" rows="4"></textarea>
                </div>
            </div>
            <p>This <a href="#" role="button" class="btn btn-secondary popover-test" title="Popover title" data-content="Popover body content is set in this attribute.">button</a> triggers a popover on click.</p>
            <hr>
            <h5>Tooltips in a modal</h5>
            <p><a href="#" class="tooltip-test" title="Tooltip">This link</a> and <a href="#" class="tooltip-test" title="Tooltip">that link</a> have tooltips on hover.</p>
        </div>--}}


    <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('course.new_question')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post"
                          action="{{route('new_question',['slug_course'=>$course['slug_'.app()->getLocale()],'slug_lesson'=>$lesson['slug_'.app()->getLocale()]])}}">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="col-form-label">@lang('course.title'):</label>
                            <p class="lead emoji-picker-container">
                                <input type="text" name="title" class="form-control" placeholder="{{trans('course.title')}}"
                                       data-emojiable="true"  data-emoji-input="unicode" maxlength="10" required>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-form-label">@lang('course.content'):</label>
                            <p class="lead emoji-picker-container">
                                <textarea class="form-control textarea-control" rows="3" name="content"
                                          placeholder="{{trans('course.content')}}" data-emojiable="true"
                                          data-emoji-input="unicode" required></textarea>
                            </p></div>
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
    @push('js')
        <script>
            $(function () {
                window.emojiPicker = new EmojiPicker({
                    emojiable_selector: '[data-emojiable=true]',
                    assetsPath: '{{asset('plugins/lib/')}}',
                    popupButtonClasses: 'fa fa-smile-o'
                });
                window.emojiPicker.discover();
            });
        </script>
        <script>
            // Google Analytics
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-49610253-3', 'auto');
            ga('send', 'pageview');
        </script>
    @endpush
@stop

