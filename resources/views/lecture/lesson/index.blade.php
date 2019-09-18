@extends('layouts.layout_lessons')
@php

    $trans = trans('course.add_lesson');
@endphp

@section('title',$trans)
@section('content')
    <style>


        /*  VIDEOS PLAYLIST
         ############################### */
        .vid-list-container {
            margin-top: 50px;
            margin-left: 50px;
            width: 80%;
            height: 450px;
            overflow: hidden;
            float: left;
        }

        .vid-list-container:hover, .vid-list-container:focus {
            overflow-y: auto;
        }

        ol#vid-list {
            margin: 0;
            padding: 0;
            background: #222;
        }

        ol#vid-list li {
            list-style: none;
        }

        ol#vid-list li a {
            text-decoration: none;
            background-color: #222;
            height: 55px;
            display: block;
            padding: 10px;
        }

        ol#vid-list li a:hover {
            background-color: #666666
        }

        .vid-thumb {
            float: right;
            margin-right: 8px;
        }

        .active-vid {
            background: #3A3A3A;
        }

        #vid-list .desc {
            color: #CACACA;
            font-size: 13px;
            margin-top: 5px;
        }


        @media (max-width: 624px) {
            body {
                margin: 15px;
            }

            .caption {
                margin-top: 40px;
            }

            .vid-list-container {
                padding-bottom: 20px;
            }

        }
    </style>

    <div class="col-md-3 left-side" style="min-height:760px ">

        <div class="heading-side">
            <img src="{{url('storage/'.$course->image->file_path)}}" class="img-thumbnail">

        </div>
        <div class="divider"></div>
        <ul class="nav nav-tabs">

            <li style="float: none">

                <div class="radio">
                    <label>
                        <h3> {{$course['title_'.app()->getLocale()]}}</h3>
                    </label>
                    <a href="#" data-toggle="modal" data-target="#add"class="btn  btn-success btn-sm" style="
    float: right;">Add Lesson</a>

                </div>
                </a>
            </li>


        </ul>
        <div class="row">
            <div class="col-md-12"><p class="h4  " style="color:white; word-wrap: break-word;">
                    {!! $course['description_'.app()->getLocale()] !!}
                </p></div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="show-videos">
            <div class="tab-content">


                <div class="vid-list-container">
                    <ol id="vid-list">
                    @foreach($course->lessons as $key => $lesson)

                        <li>
                            <div class="row">
                                <div class="col-md-9">
                                    <a href="{{route('course_lesson',['course_id'=>$course['slug_'.app()->getLocale()],'lesson_id'=>$lesson['slug_'.app()->getLocale()]])}}">

                                        <div class="desc">{{$lesson['title_'.app()->getLocale()]}}</div>

                                    </a>
                                </div>
                                <div class="col-md-1">

                                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" aria-expanded="true">


                                        <dev class="desc">
                                            <i class="fa fa-ellipsis-v fa-2x "></i>
                                    </dev>


                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"  data-toggle="modal" data-target="#edit-{{$key}}">@lang('admin.edit')</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#delete">@lang('admin.delete')</a></li>
                                    </ul>
                                    <div class="modal fade" id="edit-{{$key}}" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">@lang('course.edit_lesson')</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        @csrf
                                                        @method('put')
                                                    </form>
                                                    <p>One fine body…</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">@lang('admin.edit')</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>

                                </div>

                            </div>
                        </li>
                        @endforeach
                    </ol>
                </div>


            </div>


        </div>
    </div>
    </div>
    <div class="modal fade" id="add" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">@lang('course.add_lesson')</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        @method('post')
                    </form>
                    <p>One fine body…</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">@lang('admin.add')</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@stop

