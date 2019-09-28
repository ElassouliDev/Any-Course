@extends('layouts.dashboard.app')
@section('title',$title)

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('admin.users')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> @lang('admin.dashboard')</a></li>
                <li><a href="{{ route('dashboard.users.index') }}"> @lang('admin.users')</a></li>
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

                    <form action="{{ route('dashboard.users.update', $user->id) }}" method="post"
                          enctype="multipart/form-data">

                        @csrf
                        @method('put')
                        <input type="hidden" name="user_id" value="{{ $user->id}}">

                        <div class="form-group">
                            <label>@lang('admin.first_name')</label>
                            <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('admin.last_name')</label>
                            <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('admin.email')</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('admin.permissions')</label>
                            <input type="radio" name="permissions"
                                   {{$user->hasRole('admin') ? 'checked' : ''}} value="admin">@lang('admin.admin')
                            <input type="radio" name="permissions"
                                   {{$user->hasRole('student') ? 'checked' : ''}}value="student">@lang('admin.student')
                            <input type="radio" name="permissions"
                                   {{$user->hasRole('lecture') ? 'checked' : ''}} value="lecture">@lang('admin.lecture')

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
