@extends('layouts.dashboard.app')
@section('title',$title)

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('admin.settings')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> @lang('admin.dashboard')</a></li>
                <li><a href="{{ route('dashboard.settings.index') }}"> @lang('admin.settings')</a></li>
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

                    <form action="{{ route('dashboard.settings.store') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        <div class="form-group">
                            <label>@lang('admin.key')</label>
                            <input type="text" name="key" class="form-control" value="{{ old('key') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('admin.value')</label>
                            <input type="text" name="value" class="form-control" value="{{ old('value') }}">
                        </div>



                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('admin.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
