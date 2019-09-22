@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('admin.dashboard')</h1>

            <ol class="breadcrumb">
                                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> @lang('admin.dashboard')</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>{{$users_count}}</h3>

                        <p>@lang('admin.count_users')</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="{{route('dashboard.users.index')}}" class="small-box-footer">
                        @lang('admin.more_info') <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$lectures_count}}</h3>

                        <p>@lang('admin.count_lectures')</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="{{route('dashboard.users.index')}}" class="small-box-footer">
                        @lang('admin.more_info') <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{$students_count}}</h3>

                        <p>@lang('admin.count_students')</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="{{route('dashboard.users.index')}}" class="small-box-footer">
                        @lang('admin.more_info') <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{$courses_count}}</h3>

                        <p>@lang('admin.count_courses')</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="{{route('dashboard.course.index')}}" class="small-box-footer">
                        @lang('admin.more_info') <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </section>
    </div>
@endsection
