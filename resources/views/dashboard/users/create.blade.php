@extends('layouts.dashboard.app')
@section('title',$title)

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('admin.users')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> @lang('admin.dashboard')</a></li>
                <li><a href="{{ route('dashboard.users.index') }}"> @lang('admin.users')</a></li>
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

                    <form action="{{ route('dashboard.users.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method('post')

                        <div class="form-group">
                            <label>@lang('admin.first_name')</label>
                            <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('admin.last_name')</label>
                            <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('admin.email')</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('admin.password')</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>@lang('admin.password_confirmation')</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>@lang('admin.permissions')</label>
                            <input type="radio" name="permissions"  value="admin">@lang('admin.admin')
                            <input type="radio" name="permissions" value="student">@lang('admin.student')
                            <input type="radio" name="permissions" value="lecture">@lang('admin.lecture')

                            </div><!-- end of nav tabs -->



                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('admin.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
