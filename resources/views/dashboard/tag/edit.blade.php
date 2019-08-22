@extends('layouts.dashboard.app')
@section('title',$title)

@section('content')
    {{--    update commit github--}}

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('admin.tag')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> @lang('admin.dashboard')</a></li>
                <li><a href="{{ route('dashboard.tag.index') }}"> @lang('admin.tag')</a></li>
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

                    <form action="{{ route('dashboard.tag.update',$tag->id) }}" method="post" >

                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label>@lang('admin.name_en')</label>
                            <input type="text" name="name_en" class="form-control" value="{{ $tag->name_en }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('admin.name_ar')</label>
                            <input type="text" name="name_ar" class="form-control" value="{{ $tag->name_ar }}">
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
