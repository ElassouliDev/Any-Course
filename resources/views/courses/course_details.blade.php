@extends('layouts.layout')
@push('css')
    <style>
        .checked {
            color: orange;
        }

        .m-portlet .m-portlet__head {
            background: linear-gradient(#29303B, #29303B, #29303B);
            color: #fff !important;
        }

        h3 {
            color: #fff;
        }

        /* width */
        ::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <style>
        .slick-prev:before, .slick-next:before {
            color: #e60404;
        }
    </style>
@endpush
<!-- end::Head -->
<!-- begin::Body -->

@section('content')
    <style>
        .carousel-control.left, .carousel-control.right {
            background: none;
            width: 25px;
        }

        .carousel-control.left {
            left: -25px;
        }

        .carousel-control.right {
            right: -25px;
        }

        .broun-block {
            background: url("http://myinstantcms.ru/images/bg-broun1.jpg") repeat scroll center top rgba(0, 0, 0, 0);
            padding-bottom: 34px;
        }

        .block-text {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 3px 0 #2c2222;
            color: #626262;
            font-size: 14px;
            margin-top: 27px;
            padding: 15px 18px;
        }

        .block-text a {
            color: #7d4702;
            font-size: 25px;
            font-weight: bold;
            line-height: 21px;
            text-decoration: none;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }

        .mark {
            padding: 12px 0;
            background: none;
        }

        .block-text p {
            color: #585858;
            font-family: Georgia;
            font-style: italic;
            line-height: 20px;
        }

        .sprite {
            background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAeUCAYAAAAU3UTMAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjY1MzJERUNDRjBEMTExRTM4N0ZFOUUyNENEOTZCNjVCIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjY1MzJERUNERjBEMTExRTM4N0ZFOUUyNENEOTZCNjVCIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NjUzMkRFQ0FGMEQxMTFFMzg3RkU5RTI0Q0Q5NkI2NUIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NjUzMkRFQ0JGMEQxMTFFMzg3RkU5RTI0Q0Q5NkI2NUIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4/ZdnrAAAydElEQVR42uydCbgUxbn3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');
        }

        .sprite-i-triangle {
            background-position: 0 -1298px;
            height: 44px;
            width: 50px;
        }

        .block-text ins {
            bottom: -44px;
            left: 50%;
            margin-left: -60px;
        }

        .block {
            display: block;
        }

        .zmin {
            z-index: 1;
        }

        .ab {
            position: absolute;
        }

        .person-text {
            padding: 10px 0 0;
            text-align: center;
            z-index: 2;
        }

        .person-text span.username {
            color: #ffcc00;
            display: block;
            font-size: 14px;
            margin-top: 3px;
            /*text-decoration: underline;*/
        }

        .person-text i {
            color: #fff;
            font-family: Georgia;
            font-size: 13px;
        }

        .rel {
            position: relative;
        }
    </style>
    <style>
        .glyphicon {
            position: relative;
            top: 1px;
            display: inline-block;
            font-family: 'Glyphicons Halflings';
            font-style: normal;
            font-weight: 400;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .glyphicon-star:before {
            content: "\e006"
        }

        .glyphicon-star-empty:before {
            content: "\e007"
        }

        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            line-height: 1
        }

        .carousel-inner > .active,
        .carousel-inner > .next,
        .carousel-inner > .prev {
            display: block
        }

        .carousel-inner > .active {
            left: 0
        }

        .carousel-inner > .next,
        .carousel-inner > .prev {
            position: absolute;
            top: 0;
            width: 100%
        }

        .carousel-inner > .next {
            left: 100%
        }

        .carousel-inner > .prev {
            left: -100%
        }

        .carousel-inner > .next.left,
        .carousel-inner > .prev.right {
            left: 0
        }

        .carousel-inner > .active.left {
            left: -100%
        }

        .carousel-inner > .active.right {
            left: 100%
        }

        .carousel-control {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 15%;
            font-size: 20px;
            color: #fff;
            text-align: center;
            text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
            filter: alpha(opacity=50);
            opacity: .5
        }

        .carousel-control.left {
            background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .5) 0, rgba(0, 0, 0, .0001) 100%);
            background-image: -o-linear-gradient(left, rgba(0, 0, 0, .5) 0, rgba(0, 0, 0, .0001) 100%);
            background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .5)), to(rgba(0, 0, 0, .0001)));
            background-image: linear-gradient(to right, rgba(0, 0, 0, .5) 0, rgba(0, 0, 0, .0001) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);
            background-repeat: repeat-x
        }

        .carousel-control.right {
            right: 0;
            left: auto;
            background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .0001) 0, rgba(0, 0, 0, .5) 100%);
            background-image: -o-linear-gradient(left, rgba(0, 0, 0, .0001) 0, rgba(0, 0, 0, .5) 100%);
            background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .0001)), to(rgba(0, 0, 0, .5)));
            background-image: linear-gradient(to right, rgba(0, 0, 0, .0001) 0, rgba(0, 0, 0, .5) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
            background-repeat: repeat-x
        }

        .carousel-control:hover,
        .carousel-control:focus {
            color: #fff;
            text-decoration: none;
            filter: alpha(opacity=90);
            outline: 0;
            opacity: .9
        }

        .carousel-control .icon-prev,
        .carousel-control .icon-next,
        .carousel-control .glyphicon-chevron-left,
        .carousel-control .glyphicon-chevron-right {
            position: absolute;
            top: 50%;
            z-index: 5;
            display: inline-block
        }

        .carousel-control .icon-prev,
        .carousel-control .glyphicon-chevron-left {
            left: 50%;
            margin-left: -10px
        }

        .carousel-control .icon-next,
        .carousel-control .glyphicon-chevron-right {
            right: 50%;
            margin-right: -10px
        }

        .carousel-control .icon-prev,
        .carousel-control .icon-next {
            width: 20px;
            height: 20px;
            margin-top: -10px;
            font-family: serif
        }

        .carousel-control .icon-prev:before {
            content: '\2039'
        }

        .carousel-control .icon-next:before {
            content: '\203a'
        }

        .carousel-indicators {
            position: absolute;
            bottom: 10px;
            left: 50%;
            z-index: 15;
            width: 60%;
            padding-left: 0;
            margin-left: -30%;
            text-align: center;
            list-style: none
        }

        .carousel-indicators li {
            display: inline-block;
            width: 10px;
            height: 10px;
            margin: 1px;
            text-indent: -999px;
            cursor: pointer;
            background-color: #000 \9;
            background-color: rgba(0, 0, 0, 0);
            border: 1px solid #fff;
            border-radius: 10px
        }

        .slick-slide.slick-current, .slick-slide.slick-current > * {
            outline: none;
        }
    </style>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        Course Details
                    </h3>
                </div>

            </div>
        </div>
        <!-- END: Subheader -->
        <div class="m-content">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title w-100">
                            <div class="m-portlet__head-text">
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        {{--<h3>The Complete Android N Developer Course</h3>--}}
                                        <h3>{{$course['title_'.app()->getLocale()]}}</h3>
                                        <p class="lead">
                                            {{$course->category['title_'.app()->getLocale()]}}
                                        </p>
                                        <div>
                                                            <span>
                                                                    <span class="fa fa-star {{$course->ratingPercent(5) >=1 ? 'checked' : ''}}"></span>
                                                                    <span class="fa fa-star {{$course->ratingPercent(5) >=2 ? 'checked' : ''}}"></span>
                                                                    <span class="fa fa-star {{$course->ratingPercent(5) >=3 ? 'checked' : ''}}"></span>
                                                                    <span class="fa fa-star {{$course->ratingPercent(5) >=4 ? 'checked' : ''}}"></span>
                                                                    <span class="fa fa-star {{$course->ratingPercent(5) >=5 ? 'checked' : ''}}"></span>
                                                                    <small>
                                                                     <b>{{$course->avgRating}}
                                                                         ( {{  $course->countPositive}} @lang('course.ratings')
                                                                         )</b>
                                                                    </small>
                                                            </span>
                                            <span>
                                                                    {{$course->students->count()}} @lang('course.students enrolled')
                                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <div class="card card-detail text-center">

                                            <a href="{{(($course->is_enroll==1)?route('course_lesson',$course['slug_'.app()->getLocale()]):'#')}}"
                                               class="img-preview">
                                                <img class="card-img-top" height="240"
                                                     src="{{url('storage/'.$course->image->file_path)}}"
                                                     alt="Card image"
                                                     style="width:100%">

                                                @if($course->is_enroll == 1)
                                                    <i class="fa fa-play"></i>
                                                    <span>@lang('course.Preview this course')</span>
                                                @endif

                                            </a>

                                            <div class="card-body">
                                                <h4 class="card-title">
                                                    <b>{{$course->category['title_'.app()->getLocale()]}}</b></h4>
                                                <p class="card-text description">{{$course->category['description_'.app()->getLocale()]}}</p>
                                                {{--      @if($course->is_paid)
                                                          <span class="pull-right"><b>--}}{{--<s>20.22$</s>  --}}{{--<i><strong>$ {{$course->price}}</strong></i></b></span>
                                                      @else
                                                          <span class="pull-right text-success pt-2"><strong>free</strong></span>

                                                      @endif--}}


                                                <form method="post"
                                                      action="{{route('user.course_enroll',$course['slug_'.app()->getLocale()])}}">
                                                    @csrf
                                                    @if($course->is_enroll == 0)
                                                        <button class="btn btn-lg btn-primary">@lang('course.enroll')</button>
                                                    @else
                                                        <button class="btn btn-lg btn-danger">@lang('course.un-enroll')</button>
                                                        <a href="{{route('course_lesson',$course['slug_'.app()->getLocale()])}}"
                                                           class="btn btn-lg btn-info">@lang('course.watch_course')</a>

                                                    @endif
                                                </form>
                                                {{--<button class="btn btn-lg btn-default">Buy Now</button>--}}

                                                <h5 class="course_inc">This Course includes:</h5>
                                                <ul class="nav flex-column course_inc_ul">
                                                    <li class="nav-item">
                                                        <span><i class="fa fa-play"></i> 32 hours on-demand video</span>
                                                    </li>
                                                    <li class="nav-item">
                                                        <span><i class="fa fa-file"></i> 106 articles</span>
                                                    </li>
                                                    <li class="nav-item">
                                                        <span><i class="fa fa-download"></i> 47 downloadable resources</span>
                                                    </li>
                                                    <li class="nav-item">
                                                        <span><i class="fa fa-life-ring"></i> Full lifetime access</span>
                                                    </li>
                                                    <li class="nav-item">
                                                        <span><i class="fa fa-mobile"></i> Access on mobile and TV</span>
                                                    </li>
                                                    <li class="nav-item">
                                                        <span><i class="fa fa-certificate"></i> Certificate of Completion</span>
                                                    </li>
                                                </ul>
                                                <hr>
                                                <a href="#"><i class="fa fa-share"></i> Share</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="card whatLearn">
                            <div class="card-title">
                                <h4>What you'll learn</h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav row">
                                    <li class="nav-item col-md-6">
                                        <span><i class="fa fa-check"></i> Make pretty much any Android app you like (your only limit is your imagination)</span>
                                    </li>
                                    <li class="nav-item col-md-6">
                                        <span><i class="fa fa-check"></i> Submit your apps to Google Play and generate revenue with Google Pay and Google Ads</span>
                                    </li>
                                    <li class="nav-item col-md-6">
                                        <span><i class="fa fa-check"></i> Become a professional app developer, take freelance gigs and work from anywhere in the world</span>
                                    </li>
                                    <li class="nav-item col-md-6">
                                        <span><i class="fa fa-check"></i> Bored with the same old, same old? Apply for a new job in a software company as an Android developer</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="course_content">
                            <h4 class="pull-left">Course Content</h4>
                            <p class="pull-right">
                                <span>272 lectures</span>
                                <span>32:31:05</span>
                            </p>
                            <div id="accordion" class="clear">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                            <i class="fa fa-plus"></i> What Does The Course Cover?
                                            <div class="pull-right">
                                                <span>4 lectures</span>
                                                <span>09:58</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="lecture-item-1-1">
                                                        <span>
                                                        <a href="javascript:void(0)">What does the course cover?</a>
                                                        </span>
                                                <div class="pull-right">
                                                    <span>Preview</span>
                                                    <span>01:23</span>
                                                </div>
                                            </div>
                                            <div class="lecture-item-1-1">
                                                    <span>
                                                        <a href="javascript:void(0)">How To Get All The Free Stuff</a>
                                                    </span>
                                                <div class="pull-right">
                                                    <span>Preview</span>
                                                    <span>03:53</span>
                                                </div>
                                            </div>
                                            <div class="lecture-item-1-1">
                                                    <span>
                                                        <a href="javascript:void(0)" class="file">Frequently Asked Questions</a>
                                                    </span>
                                                <div class="pull-right">
                                                    <span>Preview</span>
                                                    <span>03:53</span>
                                                </div>
                                            </div>
                                            <div class="lecture-item-1-1">
                                                    <span>
                                                        <a href="javascript:void(0)">Asking Great Questions & Debugging Your Code</a>
                                                    </span>
                                                <div class="pull-right">
                                                    <span>Preview</span>
                                                    <span>03:53</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseTwo">
                                            <i class="fa fa-plus"></i> What Does The Course Cover?
                                            <div class="pull-right">
                                                <span>4 lectures</span>
                                                <span>09:58</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="lecture-item-1-1">
                                                            <span>
                                                                <a href="javascript:void(0)">What does the course cover?</a>
                                                            </span>
                                                <div class="pull-right">
                                                    <span>Preview</span>
                                                    <span>01:23</span>
                                                </div>
                                            </div>
                                            <div class="lecture-item-1-1">
                                                            <span>
                                                                <a href="javascript:void(0)">How To Get All The Free Stuff</a>
                                                            </span>
                                                <div class="pull-right">
                                                    <span>Preview</span>
                                                    <span>03:53</span>
                                                </div>
                                            </div>
                                            <div class="lecture-item-1-1">
                                                            <span>
                                                                <a href="javascript:void(0)" class="file">Frequently Asked Questions</a>
                                                            </span>
                                                <div class="pull-right">
                                                    <span>Preview</span>
                                                    <span>03:53</span>
                                                </div>
                                            </div>
                                            <div class="lecture-item-1-1">
                                                            <span>
                                                                <a href="javascript:void(0)">Asking Great Questions & Debugging Your Code</a>
                                                            </span>
                                                <div class="pull-right">
                                                    <span>Preview</span>
                                                    <span>03:53</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseThree">
                                            <i class="fa fa-plus"></i> What Does The Course Cover?
                                            <div class="pull-right">
                                                <span>4 lectures</span>
                                                <span>09:58</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="lecture-item-1-1">
                                                        <span>
                                                            <a href="javascript:void(0)">What does the course cover?</a>
                                                        </span>
                                                <div class="pull-right">
                                                    <span>Preview</span>
                                                    <span>01:23</span>
                                                </div>
                                            </div>
                                            <div class="lecture-item-1-1">
                                                        <span>
                                                            <a href="javascript:void(0)">How To Get All The Free Stuff</a>
                                                        </span>
                                                <div class="pull-right">
                                                    <span>Preview</span>
                                                    <span>03:53</span>
                                                </div>
                                            </div>
                                            <div class="lecture-item-1-1">
                                                        <span>
                                                            <a href="javascript:void(0)" class="file">Frequently Asked Questions</a>
                                                        </span>
                                                <div class="pull-right">
                                                    <span>Preview</span>
                                                    <span>03:53</span>
                                                </div>
                                            </div>
                                            <div class="lecture-item-1-1">
                                                        <span>
                                                            <a href="javascript:void(0)">Asking Great Questions & Debugging Your Code</a>
                                                        </span>
                                                <div class="pull-right">
                                                    <span>Preview</span>
                                                    <span>03:53</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseFour">
                                            <i class="fa fa-plus"></i> What Does The Course Cover?
                                            <div class="pull-right">
                                                <span>4 lectures</span>
                                                <span>09:58</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="lecture-item-1-1">
                                                        <span>
                                                            <a href="javascript:void(0)">What does the course cover?</a>
                                                        </span>
                                                <div class="pull-right">
                                                    <span>Preview</span>
                                                    <span>01:23</span>
                                                </div>
                                            </div>
                                            <div class="lecture-item-1-1">
                                                        <span>
                                                            <a href="javascript:void(0)">How To Get All The Free Stuff</a>
                                                        </span>
                                                <div class="pull-right">
                                                    <span>Preview</span>
                                                    <span>03:53</span>
                                                </div>
                                            </div>
                                            <div class="lecture-item-1-1">
                                                        <span>
                                                            <a href="javascript:void(0)" class="file">Frequently Asked Questions</a>
                                                        </span>
                                                <div class="pull-right">
                                                    <span>Preview</span>
                                                    <span>03:53</span>
                                                </div>
                                            </div>
                                            <div class="lecture-item-1-1">
                                                        <span>
                                                            <a href="javascript:void(0)">Asking Great Questions & Debugging Your Code</a>
                                                        </span>
                                                <div class="pull-right">
                                                    <span>Preview</span>
                                                    <span>03:53</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseFive">
                                            <i class="fa fa-plus"></i> What Does The Course Cover?
                                            <div class="pull-right">
                                                <span>4 lectures</span>
                                                <span>09:58</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div id="collapseFive" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="lecture-item-1-1">
                                                        <span>
                                                            <a href="javascript:void(0)">What does the course cover?</a>
                                                        </span>
                                                <div class="pull-right">
                                                    <span>Preview</span>
                                                    <span>01:23</span>
                                                </div>
                                            </div>
                                            <div class="lecture-item-1-1">
                                                        <span>
                                                            <a href="javascript:void(0)">How To Get All The Free Stuff</a>
                                                        </span>
                                                <div class="pull-right">
                                                    <span>Preview</span>
                                                    <span>03:53</span>
                                                </div>
                                            </div>
                                            <div class="lecture-item-1-1">
                                                        <span>
                                                            <a href="javascript:void(0)" class="file">Frequently Asked Questions</a>
                                                        </span>
                                                <div class="pull-right">
                                                    <span>Preview</span>
                                                    <span>03:53</span>
                                                </div>
                                            </div>
                                            <div class="lecture-item-1-1">
                                                        <span>
                                                            <a href="javascript:void(0)">Asking Great Questions & Debugging Your Code</a>
                                                        </span>
                                                <div class="pull-right">
                                                    <span>Preview</span>
                                                    <span>03:53</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7">
                        <div class="course_content">
                            <h4>Requirements</h4>
                            <ul>
                                <li>A Windows PC, Mac or Linux Computer</li>
                                <li>ZERO programming knowledge required - I'll teach you everything you need to
                                    know
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="course_content">
                            <h4>Descriptions</h4>
                            <p>
                                <b>Please note support for this course has now stopped, and that there is a newer
                                    version of the course (The Complete Android Oreo Developer Course)
                                    available.</b><br>

                                In this Android N version of the course I use Android Studio versions 2.0 and 2.1.2,
                                and recommend students do the same.


                            </p>
                        </div>
                    </div>
                </div>
                <div class="container" style="    padding-bottom: 27px;
    padding: 0px 20px 20px;">
                    <div class="multiple-items">
                        @foreach($reveiw_course as $review)
                            <div>
                                <div class="block-text rel zmin">
                                    {{--<a title="" href="#">Hercules</a>--}}
                                    <div class="mark">My rating: <span class="rating-input"><span
                                                    data-value="0"
                                                    class="fa {{$review->rating->rating>0?'fa-star':'fa-star-o'}} "></span><span
                                                    data-value="1"
                                                    class="fa {{$review->rating->rating>1?'fa-star':'fa-star-o'}} "></span><span
                                                    data-value="2"
                                                    class="fa {{$review->rating->rating>2?'fa-star':'fa-star-o'}} "></span><span
                                                    data-value="3"
                                                    class="fa {{$review->rating->rating>3?'fa-star':'fa-star-o'}} "></span><span
                                                    data-value="4"
                                                    class="fa {{$review->rating->rating>4?'fa-star':'fa-star-o'}} "></span>
                                        </span>
                                    </div>
                                    <p>{{$review->content}}</p>
                                    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                </div>
                                <div class="person-text rel">
                                    <img src="{{
                                    isset($review->user->image->file_path)?
                                    url('/').'/storage/'.$review->user->image->file_path:
                                    'https://ssl.gstatic.com/accounts/ui/avatar_2x.png'
                                    }}" class="img-circle img-fluid" style="width: 65px;height: 65px;border-radius: 50%; "/>
                                    <span  class="username">{{$review->user->first_name .' '.$review->user->last_name}}</span>
                                </div>
                            </div>

                        @endforeach
                       {{-- <div>
                            <div class="block-text rel zmin">
                                <a title="" href="#">Hercules</a>
                                <div class="mark">My rating: <span class="rating-input"><span
                                                data-value="0"
                                                class="glyphicon glyphicon-star"></span><span
                                                data-value="1"
                                                class="glyphicon glyphicon-star"></span><span
                                                data-value="2"
                                                class="glyphicon glyphicon-star"></span><span
                                                data-value="3"
                                                class="glyphicon glyphicon-star"></span><span
                                                data-value="4"
                                                class="glyphicon glyphicon-star-empty"></span><span
                                                data-value="5"
                                                class="glyphicon glyphicon-star-empty"></span>  </span>
                                </div>
                                <p>Never before has there been a good film portrayal of ancient
                                    Greece's favourite myth. So why would Hollywood start now? This
                                    latest attempt at bringing the son of Zeus to the big screen is
                                    brought to us by X-Men: The last Stand director Brett Ratner. If
                                    the name of the director wasn't enough to dissuade ...</p>
                                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                            </div>
                            <div class="person-text rel">
                                <img src="data:image/png;base64,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"/>
                                <a title="" href="#">Anna</a>
                                <i>from Glasgow, Scotland</i>
                            </div>
                        </div>
                        <div>
                            <div class="block-text rel zmin">
                                <a title="" href="#">Hercules</a>
                                <div class="mark">My rating: <span class="rating-input"><span
                                                data-value="0"
                                                class="glyphicon glyphicon-star"></span><span
                                                data-value="1"
                                                class="glyphicon glyphicon-star"></span><span
                                                data-value="2"
                                                class="glyphicon glyphicon-star"></span><span
                                                data-value="3"
                                                class="glyphicon glyphicon-star"></span><span
                                                data-value="4"
                                                class="glyphicon glyphicon-star-empty"></span><span
                                                data-value="5"
                                                class="glyphicon glyphicon-star-empty"></span>  </span>
                                </div>
                                <p>Never before has there been a good film portrayal of ancient
                                    Greece's favourite myth. So why would Hollywood start now? This
                                    latest attempt at bringing the son of Zeus to the big screen is
                                    brought to us by X-Men: The last Stand director Brett Ratner. If
                                    the name of the director wasn't enough to dissuade ...</p>
                                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                            </div>
                            <div class="person-text rel">
                                <img src="data:image/png;base64,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"/>
                                <a title="" href="#">Anna</a>
                                <i>from Glasgow, Scotland</i>
                            </div>
                        </div>
                        <div>
                            <div class="block-text rel zmin">
                                <a title="" href="#">Hercules</a>
                                <div class="mark">My rating: <span class="rating-input"><span
                                                data-value="0"
                                                class="glyphicon glyphicon-star"></span><span
                                                data-value="1"
                                                class="glyphicon glyphicon-star"></span><span
                                                data-value="2"
                                                class="glyphicon glyphicon-star"></span><span
                                                data-value="3"
                                                class="glyphicon glyphicon-star"></span><span
                                                data-value="4"
                                                class="glyphicon glyphicon-star-empty"></span><span
                                                data-value="5"
                                                class="glyphicon glyphicon-star-empty"></span>  </span>
                                </div>
                                <p>Never before has there been a good film portrayal of ancient
                                    Greece's favourite myth. So why would Hollywood start now? This
                                    latest attempt at bringing the son of Zeus to the big screen is
                                    brought to us by X-Men: The last Stand director Brett Ratner. If
                                    the name of the director wasn't enough to dissuade ...</p>
                                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                            </div>
                            <div class="person-text rel">
                                <img src="data:image/png;base64,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"/>
                                <a title="" href="#">Anna</a>
                                <i>from Glasgow, Scotland</i>
                            </div>
                        </div>
                        <div>
                            <div class="block-text rel zmin">
                                <a title="" href="#">Hercules</a>
                                <div class="mark">My rating: <span class="rating-input"><span
                                                data-value="0"
                                                class="glyphicon glyphicon-star"></span><span
                                                data-value="1"
                                                class="glyphicon glyphicon-star"></span><span
                                                data-value="2"
                                                class="glyphicon glyphicon-star"></span><span
                                                data-value="3"
                                                class="glyphicon glyphicon-star"></span><span
                                                data-value="4"
                                                class="glyphicon glyphicon-star-empty"></span><span
                                                data-value="5"
                                                class="glyphicon glyphicon-star-empty"></span>  </span>
                                </div>
                                <p>Never before has there been a good film portrayal of ancient
                                    Greece's favourite myth. So why would Hollywood start now? This
                                    latest attempt at bringing the son of Zeus to the big screen is
                                    brought to us by X-Men: The last Stand director Brett Ratner. If
                                    the name of the director wasn't enough to dissuade ...</p>
                                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                            </div>
                            <div class="person-text rel">
                                <img src="data:image/png;base64,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"/>
                                <a title="" href="#">Anna</a>
                                <i>from Glasgow, Scotland</i>
                            </div>
                        </div>--}}

                    </div>
                </div>

            </div>
        </div>


    </div>



    <!-- end:: Body -->
    <!-- begin::Footer -->
    <!-- end::Footer -->
@endsection
@push('js')
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.multiple-items').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3
            });

        });
    </script>
@endpush
{{--<ul>
    <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Showcase" data-placement="left">
        <a href="">
            <i class="la la-eye"></i>
        </a>
    </li>
    <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Pre-sale Chat" data-placement="left">
        <a href="" >
            <i class="la la-comments-o"></i>
        </a>
    </li>
    -->
    <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Purchase" data-placement="left">
        <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes"
           target="_blank">
            <i class="la la-cart-arrow-down"></i>
        </a>
    </li>
    <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Documentation" data-placement="left">
        <a href="http://keenthemes.com/metronic/documentation.html" target="_blank">
            <i class="la la-code-fork"></i>
        </a>
    </li>
    <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Support" data-placement="left">
        <a href="http://keenthemes.com/forums/forum/support/metronic5/" target="_blank">
            <i class="la la-life-ring"></i>
        </a>
    </li>
</ul>--}}
<!-- begin::Quick Nav -->
<!--begin::Base Scripts -->
{{--
<script src="vendors/vendors.bundle.js" type="text/javascript"></script>
<script src="js/scripts.bundle.js" type="text/javascript"></script>
<!--end::Base Scripts -->
<!--begin::Page Snippets -->
<script src="js/dashboard.js" type="text/javascript"></script>
<!--end::Page Snippets -->
<script>
    $(document).ready(function () {
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function () {
            $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });

        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function () {
            $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function () {
            $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });
</script>
</body>
<!-- end::Body -->
</html>
--}}
