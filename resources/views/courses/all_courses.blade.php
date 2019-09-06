@extends('layouts.layout')
@section('title', 'courses')
@section('content')
    <div class="m-content">
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            @lang('course.LatestCourses')
                        </h3>
                        {{--     <div >
                                 <span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
                                     <span class="m-subheader__daterange-label">
                                         <span class="m-subheader__daterange-title"></span>
                                         <span class="m-subheader__daterange-date m--font-brand"></span>
                                     </span>
                                     <a href="#"
                                        class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                         <i class="la la-angle-down"></i>
                                     </a>
                                 </span>
                             </div>--}}
                    </div>
                </div>
            </div>
            <div class="row px-5 py-2 pb-5">
                @foreach($courses_latest as  $course)
                    <div class="col-md-4">
                        <div class="card card-course">
                            <img class="card-img-top" height="240" src="{{url('storage/'.$course->image->file_path)}}"
                                 alt="Card image" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title"><b>{{$course['title_'.app()->getLocale()]}}</b></h4>
                                <p class="card-text description">{{$course->category['title_'.app()->getLocale()]}}</p>
                                <a href="{{route('course_details',$course->id)}}" class="btn btn-primary">View
                                    Course</a>
                                @if($course->is_paid)
                                    <span class="pull-right"><b>{{--<s>20.22$</s>  --}}
                                            <i><strong>$ {{$course->price}}</strong></i></b></span>
                                @else
                                    <span class="pull-right text-success pt-2"><strong>free</strong></span>

                                @endif

                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            @lang('course.allCourses')
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row px-5 py-2 pb-5">
                @foreach($courses_all as  $course)
                    <div class="col-md-4">
                        <div class="card card-course">
                            <img class="card-img-top" height="240" src="{{url('storage/'.$course->image->file_path)}}"
                                 alt="Card image" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title"><b>{{$course['title_'.app()->getLocale()]}}</b></h4>
                                <p class="card-text description">{{$course->category['title_'.app()->getLocale()]}}</p>
                                <a href="{{route('course_details',$course->id)}}" class="btn btn-primary">View
                                    Course</a>
                                @if($course->is_paid)
                                    <span class="pull-right"><b>{{--<s>20.22$</s>  --}}
                                            <i><strong>$ {{$course->price}}</strong></i></b></span>
                                @else
                                    <span class="pull-right text-success pt-2"><strong>free</strong></span>

                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-course">
                            <img class="card-img-top" height="240"
                                 src="{{url('course_assets/img/courses/1555506865369_js.jpg')}}" alt="Card image"
                                 style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title"><b>Javascript</b></h4>
                                <p class="card-text description">Lorem ipsum dolor sit amet.</p>
                                <a href="#" class="btn btn-primary">View Course</a>
                                <span class="pull-right"><b><s>20.22$</s>  <i><strong>$ 11.89</strong></i></b></span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection()
