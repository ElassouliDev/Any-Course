@extends('layouts.dashboard.app')
@section('title',$title)

@section('content')
    {{--    update commit github--}}

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('admin.course')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> @lang('admin.dashboard')</a></li>
                <li><a href="{{ route('dashboard.course.index') }}"> @lang('admin.course')</a></li>
                <li class="active">@lang('admin.edit')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('admin.edit')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.course.update',$course->id) }}" method="post" >

                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.title_ar')</label>
                                    <input type="text" name="title_ar" class="form-control"
                                           value="{{ $course->title_ar }}">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.title_en')</label>
                                    <input type="text" name="title_en" class="form-control"
                                           value="{{ $course->title_en }}">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.course')</label>
                                    <select name="category_id" class="form-control">
                                        <option value="-1">-- @lang('admin.SelectCategory')--</option>

                                        @foreach($categories as $category)
                                            <option @if ($course->category_id == $category->id))
                                                    selected="selected"
                                                    @endif value="{{$category->id}}">{{$category['title_'.app()->getLocale()]}}</option>
                                        @endforeach

                                    </select>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.isPaid')</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <select class="form-control" name="is_paid">
                                                <option value="-1">-- @lang('admin.selectPaid')--</option>
                                                <option @if (!$course->is_paid))
                                                        selected="selected"
                                                        @endif
                                                                value="0">@lang('admin.free')</option>
                                                <option @if ($course->is_paid))
                                                        selected="selected"
                                                        @endif
                                                        value="1">@lang('admin.paid')</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">

                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <input type="number" min="0"  name="price" class="form-control" value="{{ $course->price}}">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.description_ar')</label>
                                    <textarea rows="6" name="description_ar"
                                              class="form-control">{{ $course->description_ar}}</textarea>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.description_en')</label>
                                    <textarea rows="6" name="description_en"
                                              class="form-control">{{ $course->description_en }}</textarea>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('admin.image')</label>
                                    <input type="file" class="form-control" name="image">
                                </div>

                            </div>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('admin.edit')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
