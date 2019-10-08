@extends('layouts.layout_lessons')
@php

    $trans = trans('course.add_lesson');
@endphp

@section('title',$trans)
@section('css')
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
        ul.nav.row {
            color: #fffff9 !important;
        }

    </style>
@endsection
@section('content')


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
                    <a href="#" data-toggle="modal" data-target="#add" class="btn  btn-success btn-sm" style="
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

                                        <a href="#" class="dropdown-toggle " data-toggle="dropdown"
                                           aria-expanded="true">


                                            <dev class="desc">
                                                <i class="fa fa-ellipsis-v fa-2x "></i>
                                            </dev>


                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" data-link="{{route('lesson.edit',[$course['slug_'.app()->getLocale()],$lesson['slug_'.app()->getLocale()]])}}" data-action="edit">@lang('admin.edit')</a></li>
                                            <li>
                                                <form method="post"
                                                        action="{{route('lesson.destroy',
                                                        ['course_id'=>$course['slug_'.app()->getLocale()],
                                                        'lesson_id'=>$lesson['slug_'.app()->getLocale()]
                                                ])}}">
                                                    @csrf
                                                    @method('DELETE')

                                                </form>
                                                <a href="#" data-action="delete">
                                                    @lang('admin.delete')
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="modal fade"  id="edit-{{$key}}" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">@lang('course.edit_lesson')</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('lesson.update',[$course['slug_'.app()->getLocale()],$lesson['slug_'.app()->getLocale()]])}}"
                                                              method="post">
                                                            @csrf
                                                            @method('put')

                                                            <input name="title_en" class="form-control">
                                                            <input name="title_ar" class="form-control">
                                                        </form>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                        <button type="button"
                                                                class="btn btn-primary">@lang('admin.edit')</button>
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
                    <form action="{{route('lesson.store',$course['slug_'.app()->getLocale()])}}" method="post">
                        @csrf
                        @method('post')
                        <input type="hidden" name="course_id" value="{{$course->id}}">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="title_ar">@lang('admin.title_ar')</label>
                                            <input id="title_ar" class="form-control" style="background: #fff"
                                                   name="title_ar" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="title_en">@lang('admin.title_en')</label>
                                            <input id="title_en" class="form-control" style="background: #fff"
                                                   name="title_en" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="file_path">@lang('admin.file_path')</label>
                                            <input id="file_path" class="form-control" style="background: #fff"
                                                   name="file_path" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">@lang('admin.add')</button>
                        </div>
                    </form>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@stop
@push('js')
    <script>
        $(document).on('click', '[data-action=delete]', function () {
            swal({
                title: "@lang('admin.confirm_delete')",
                icon: "warning",
                dangerMode: true,
                buttons: ["@lang('admin.cancel')", "@lang('admin.delete')"]
            })

                .then((process) => {
                    if (!process) {

                        return;
                    }
                    $(this).parent().find('form').submit();

                });
        });

        $(document).on('click', '[data-action=edit]', function () {
            url = $(this).attr('data-link');
            $('#update').remove();
            $.get(url,function (response) {
                $('html').append(response.data);
                $('#update').modal('show');

            })
        });
    </script>
@endpush
