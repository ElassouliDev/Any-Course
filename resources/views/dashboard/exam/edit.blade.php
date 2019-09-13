@extends('layouts.dashboard.app')
@section('title',$title)
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    {{--    update commit github--}}

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('admin.exam')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> @lang('admin.dashboard')</a></li>
                <li><a href="{{ route('dashboard.exam.index') }}"> @lang('admin.exam')</a></li>
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

                    <form action="{{ route('dashboard.exam.update',$exam->id) }}" method="post" enctype="multipart/form-data">

                        @csrf
        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.title_ar')</label>
                                    <input type="text" name="title_ar" class="form-control"
                                           value="{{ $exam->title_ar }}">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.title_en')</label>
                                    <input type="text" name="title_en" class="form-control"
                                           value="{{ $exam->title_en }}">
                                </div>

                            </div>
                        </div>
                        <div class="row">


                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.course')</label>
                                    <select name="course_id" class="js-example-basic-single form-control">
                                        <option value="-1">-- @lang('admin.Selectlesson')--</option>

                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}" >{{ $course['title_'.app()->getLocale()] }}</option>
                                        @endforeach


                                    </select>
                                </div>

                            </div>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('admin.edit')
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
