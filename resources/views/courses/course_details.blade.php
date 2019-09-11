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
    </style>

@endpush
<!-- end::Head -->
<!-- begin::Body -->

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        Course Details
                    </h3>
                </div>
                {{--   <div>
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
                                            {{$course['description_'.app()->getLocale()]}}
                                            {{--  Learn Android App Development with Android 7 Nougat by
                                              building real apps including Uber, Whatsapp and Instagram !--}}
                                        </p>
                                        <div>
                                                            <span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star"></span>
                                                                    <span class="fa fa-star"></span>
                                                                    <small>
                                                                     <b>3 (20,782 ratings)</b>
                                                                    </small>
                                                            </span>
                                            <span>
                                                                    112,366 students enrolled
                                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <div class="card card-detail text-center">
                                            <a href="show_course.html" class="img-preview">
                                                <img class="card-img-top" height="240"
                                                     src="{{url('storage/'.$course->image->file_path)}}"
                                                     alt="Card image"
                                                     style="width:100%">
                                                <i class="fa fa-play"></i>
                                                <span>Preview this course</span>
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
                                                      action="{{route('user',$course->id)}}">
                                                    @csrf
                                                    @if($course->is_enroll == 0)
                                                        <button class="btn btn-lg btn-primary">@lang('course.enroll')</button>
                                                    @else
                                                        <button class="btn btn-lg btn-danger">@lang('course.In-enroll')</button>
                                                        <a  href="{{route('course_lesson',$course->id)}}" class="btn btn-lg btn-info">@lang('course.watch_course')</a>

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
            </div>
        </div>


    </div>
    <!-- end:: Body -->
    <!-- begin::Footer -->
    <!-- end::Footer -->
@endsection
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
