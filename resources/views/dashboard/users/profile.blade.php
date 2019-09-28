@extends('layouts.dashboard.app')
@section('title',$title)

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('admin.profile')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> @lang('admin.dashboard')</a></li>
                <li class="active">@lang('admin.profile')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('admin.profile')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.users.update_profile', auth()->user()->id) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method('post')

                        <div class="form-group">
                            <label>@lang('admin.first_name')</label>
                            <input type="text" name="first_name" class="form-control" value="{{  auth()->user()->first_name }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('admin.last_name')</label>
                            <input type="text" name="last_name" class="form-control" value="{{  auth()->user()->last_name }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('admin.email')</label>
                            <input type="email" name="email" class="form-control" value="{{  auth()->user()->email }}">
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
