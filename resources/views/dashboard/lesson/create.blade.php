@extends('layouts.dashboard.app')
@section('title',$title)
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css" rel="stylesheet" />
    @endpush

@section('content')
    {{--    update commit github--}}

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('admin.lesson')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> @lang('admin.dashboard')</a></li>
                <li><a href="{{ route('dashboard.lesson.index') }}"> @lang('admin.lesson')</a></li>
                <li class="active">@lang('admin.add')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('admin.add')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.lesson.store') }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.title_ar')</label>
                                    <input type="text" name="title_ar" class="form-control"
                                           value="{{ old('title_ar') }}">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.title_en')</label>
                                    <input type="text" name="title_en" class="form-control"
                                           value="{{ old('title_en') }}">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.description_ar')</label>
                                    <textarea rows="6" name="description_ar"
                                              class="form-control">{{ old('description_ar') }}</textarea>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.description_en')</label>
                                    <textarea rows="6" name="description_en"
                                              class="form-control">{{ old('description_en') }}</textarea>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.file_path')</label>
                                  <input type="url" name="file_path" class="form-control">

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.course')</label>
                                    <select name="course_id" class="js-example-basic-single form-control" >
                                        <option value="-1">-- @lang('admin.SelectCourse')--</option>

                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}" >{{ $course['title_'.app()->getLocale()] }}</option>

                                        @endforeach


                                    </select>

                                </div>

                            </div>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('admin.add')
                            </button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
