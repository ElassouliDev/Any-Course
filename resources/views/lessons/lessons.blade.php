@extends('layouts.layout_lessons')


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
                        <a  href="@if($lesson->id != $lesson_watching->id){{route('course_lesson',['course_id'=>$lesson->course_id,'lesson_id'=>$lesson->id])}}@else # @endif">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1"
                                           @if($lesson->id == $lesson_watching->id)checked @endif   >
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
                <li  style="float: none">

                        <div class="radio">
                            <label>

                             @lang('course.no_lessons')
                            </label>

                        </div>
                    </a>
                </li>

            @endif

            {{--<li><a data-toggle="tab" href="#menu1">--}}
                    {{--<div class="radio">--}}
                        {{--<label>--}}
                            {{--<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">--}}
                            {{--2. Share Your Great & Awful Sites--}}
                        {{--</label>--}}
                    {{--</div>--}}
                {{--</a></li>--}}
    {{--        <li><a data-toggle="tab" href="#menu2">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                            3. Intro To Project
                        </label>
                    </div>
                </a></li>
            <li><a data-toggle="tab" href="#menu3">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios4" value="option4">
                            4. Pan, Zoom, Touch, Lck
                        </label>
                    </div>
                </a></li>
            <li><a data-toggle="tab" href="#menu4">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios5" value="option5">
                            5. Setting up chrome Dev Tools
                        </label>
                    </div>
                </a></li>
            <li><a data-toggle="tab" href="#menu5">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios6" value="option6">
                            6. Lorem ipsum dolor sit amet.
                        </label>
                    </div>
                </a></li>
            <li><a data-toggle="tab" href="#menu6">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios7" value="option7">
                            7. Lorem ipsum dolor sit amet.
                        </label>
                    </div>
                </a></li>
            <li><a data-toggle="tab" href="#menu7">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios8" value="option8">
                            8. Lorem ipsum dolor sit amet.
                        </label>
                    </div>
                </a></li>
            <li><a data-toggle="tab" href="#menu8">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios9" value="option9">
                            9. Lorem ipsum dolor sit amet.
                        </label>
                    </div>
                </a></li>
            <li><a data-toggle="tab" href="#menu9">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios10" value="option10">
                            10. Lorem ipsum dolor sit amet.
                        </label>
                    </div>
                </a></li>
            <li><a data-toggle="tab" href="#menu10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios11" value="option11">
                            11. Lorem ipsum dolor sit amet.
                        </label>
                    </div>
                </a></li>
            <li><a data-toggle="tab" href="#menu11">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios12" value="option12">
                            12. Lorem ipsum dolor sit amet.
                        </label>
                    </div>
                </a></li>
            <li><a data-toggle="tab" href="#menu12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios13" value="option13">
                            13. Lorem ipsum dolor sit amet.
                        </label>
                    </div>
                </a></li>
            <li><a data-toggle="tab" href="#menu12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios14" value="option13">
                            13. Lorem ipsum dolor sit amet.
                        </label>
                    </div>
                </a></li>
            <li><a data-toggle="tab" href="#menu12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios15" value="option13">
                            13. Lorem ipsum dolor sit amet.
                        </label>
                    </div>
                </a></li>--}}
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
                @if (count($lesson_watching) >0)
                    <div id="menu1" class="tab-pane fade in active ">
                        <h3 class="text-center">{{$lesson_watching['title_'.app()->getLocale()]}}</h3>
                        <a href="{{route('list_question',$lesson_watching->id)}}"><span class="back">@lang('course.feed_back')</span></a>
                        <div class="video text-center">
                            <iframe width="560" height="420" src="{{$lesson_watching->file->file_path}}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </div>
                    </div>


                    </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new" >@lang('course.new_comment')</button>

            <div class="container" style="background-color: #f2f3f8; margin-top: 50px">
                @foreach ($lesson->comment as $comment)


            <div class="row bg-light pt-2 px-1">
                <div class="col-md-12 border border-bottom">
                    <img class="img-fluid img-rounded" src="{{isset($comment->user->image()->file_path) ? url('storage/'.$comment->user->image()->file_path) : url('storage\image\user.jpeg')}}"
                         style="width: 50px;height: 50px; border-radius: 50%">
                    <span class=""> {{$comment->user->first_name.' '.$comment->user->last_name}}</span>
                </div>
                <div class="divider"></div>
                <div class="col-md-12 lead ">
                    {{$comment->content}}
                </div>
                <div class="divider"></div>
            </div>
                @endforeach

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
        <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <textarea class="form-control"  rows="4" name="content" id="content" required></textarea>
                                <input type="hidden" name='lesson_id' value="{{$lesson->id}}">

                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">@lang('admin.cancel')</button>
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
@endpush
