@extends('layouts.layout_lessons')
@php

$trans = trans('course.add_lesson');
@endphp
@section('title',$trans)
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

                <li style="float: none">

                    <div class="radio">
                        <label>
                            @lang('course.no_lessons')
                        </label>

                    </div>
                    </a>
                </li>


        </ul>

    </div>

    <div class="col-md-9">
        <div class="show-videos">
            <div class="tab-content">


                    <div id="menu1" class="tab-pane fade in active ">
                        <h3 class="text-center">@lang('course.soon')</h3>
                        <a href="#"><span class="back">@lang('course.feed_back')</span></a>
                        <div class="video text-center">
                        </div>
                    </div>


            </div>




        </div>
    </div>
    </div>

@stop

