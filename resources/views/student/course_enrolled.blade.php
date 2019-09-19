@extends('layouts.layout')
@section('title', 'courses')
@section('content')
    <div class="m-content">
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            @lang('course.course_enrolled')
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row px-5 py-2 pb-5">
                @foreach($courses as  $course)

                    <div class="col-md-4">
                        <div class="card card-course">
                            <img class="card-img-top" height="240"
                                 src="{{url('storage/'.($course->image->file_path ??'storage/user.jpeg'))}}"
                                 alt="Card image" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title"><b>{{$course['title_'.app()->getLocale()]}}</b></h4>
                                <p class="card-text description">{{$course->category['title_'.app()->getLocale()]}}</p>
                                <a href="{{route('course_details',$course['slug_'.app()->getLocale()])}}" class="btn btn-primary">@lang('course.view_course')</a>

                            </div>
                        </div>
                    </div>

                @endforeach

                {{ $courses->links() }}

            </div>
        </div>
    </div>
@endsection()

