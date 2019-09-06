@extends('layouts.layout_lessons')


@section('content')

    <div class="col-md-3 left-side" style="min-height:760px ">

        <div class="heading-side">
            <i class="fa fa-caret-left fa-lg"></i>
            <h5>Lesson 1 :</h5>
            <p class="my-3" style="margin-top: 15px;"> Why Responsive
            <p>


        </div>
        <div class="divider"></div>
        <ul class="nav nav-tabs">
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
                    <a href="#"><span class="back">Feed back</span></a>
                    <div class="video text-center">
                        <iframe width="560" height="420" src="https://www.youtube.com/embed/HdSaxRtNxAM"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>--}}
                <div id="menu1" class="tab-pane fade in active ">
                    <h3 class="text-center">{{$lesson_watching['title_'.app()->getLocale()]}}</h3>
                    <a href="{{route('list_question',$lesson_watching->id)}}"><span class="back">Feed back</span></a>
                    <div class="video text-center">
                        <iframe width="560" height="420" src="{{$lesson_watching->file->file_path}}"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
               {{-- <div id="menu3" class="tab-pane fade">
                    <h3 class="text-center">Third Lesson</h3>
                    <a href="#"><span class="back">Feed back</span></a>
                    <div class="video text-center">
                        <iframe width="560" height="420" src="https://www.youtube.com/embed/HdSaxRtNxAM"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
                <div id="menu4" class="tab-pane fade">
                    <h3 class="text-center">Fourth Lesson</h3>
                    <a href="#"><span class="back">Feed back</span></a>
                    <div class="video text-center">
                        <iframe width="560" height="420" src="https://www.youtube.com/embed/HdSaxRtNxAM"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
                <div id="menu5" class="tab-pane fade">
                    <h3 class="text-center">First Lesson</h3>
                    <a href="#"><span class="back">Feed back</span></a>
                    <div class="video text-center">
                        <iframe width="560" height="420" src="https://www.youtube.com/embed/HdSaxRtNxAM"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
                <div id="menu6" class="tab-pane fade">
                    <h3 class="text-center">First Lesson</h3>
                    <a href="#"><span class="back">Feed back</span></a>
                    <div class="video text-center">
                        <iframe width="560" height="420" src="https://www.youtube.com/embed/HdSaxRtNxAM"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
                <div id="menu7" class="tab-pane fade">
                    <h3 class="text-center">First Lesson</h3>
                    <a href="#"><span class="back">Feed back</span></a>
                    <div class="video text-center">
                        <iframe width="560" height="420" src="https://www.youtube.com/embed/HdSaxRtNxAM"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
                <div id="menu8" class="tab-pane fade">
                    <h3 class="text-center">First Lesson</h3>
                    <a href="#"><span class="back">Feed back</span></a>
                    <div class="video text-center">
                        <iframe width="560" height="420" src="https://www.youtube.com/embed/HdSaxRtNxAM"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
                <div id="menu9" class="tab-pane fade">
                    <h3 class="text-center">First Lesson</h3>
                    <a href="#"><span class="back">Feed back</span></a>
                    <div class="video text-center">
                        <iframe width="560" height="420" src="https://www.youtube.com/embed/HdSaxRtNxAM"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
                <div id="menu10" class="tab-pane fade">
                    <h3 class="text-center">First Lesson</h3>
                    <a href="#"><span class="back">Feed back</span></a>
                    <div class="video text-center">
                        <iframe width="560" height="420" src="https://www.youtube.com/embed/HdSaxRtNxAM"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
                <div id="menu11" class="tab-pane fade">
                    <h3 class="text-center">First Lesson</h3>
                    <a href="#"><span class="back">Feed back</span></a>
                    <div class="video text-center">
                        <iframe width="560" height="420" src="https://www.youtube.com/embed/HdSaxRtNxAM"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
                <div id="menu12" class="tab-pane fade">
                    <h3 class="text-center">First Lesson</h3>
                    <a href="#"><span class="back">Feed back</span></a>
                    <div class="video text-center">
                        <iframe width="560" height="420" src="https://www.youtube.com/embed/HdSaxRtNxAM"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
                <div id="menu13" class="tab-pane fade">
                    <h3 class="text-center">First Lesson</h3>
                    <a href="#"><span class="back">Feed back</span></a>
                    <div class="video text-center">
                        <iframe width="560" height="420" src="https://www.youtube.com/embed/HdSaxRtNxAM"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>--}}
            </div>
        </div>
    </div>

@stop
