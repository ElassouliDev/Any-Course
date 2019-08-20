@extends('layouts.dashboard.app')
@section('title',$title)

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('admin.category')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> @lang('admin.dashboard')</a></li>
                <li><a href="{{ route('dashboard.category.index') }}"> @lang('admin.category')</a></li>
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

                    <form action="{{ route('dashboard.category.update',$category->id) }}" method="post" >

                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label>@lang('admin.title_en')</label>
                            <input type="text" name="title_en" class="form-control" value="{{ $category->title_en }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('admin.title_ar')</label>
                            <input type="text" name="title_ar" class="form-control" value="{{ $category->title_ar }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('admin.description_ar')</label>
                            <textarea name="description_ar" class="form-control" >{{ $category->description_ar }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>@lang('admin.description_en')</label>
                            <textarea name="description_en" class="form-control" >{{ $category->description_en }}</textarea>
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
