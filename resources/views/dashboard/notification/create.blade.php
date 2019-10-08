@extends('layouts.dashboard.app')
@section('title',$title)


@section('content')
    {{--    update commit github--}}

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('admin.lesson')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> @lang('admin.dashboard')</a></li>
                <li><a href="{{ route('dashboard.notifications.index') }}"> @lang('admin.notifications')</a></li>
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

                    <form action="{{ route('dashboard.notifications.store') }}" method="post" >

                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.message_en')</label>
                                    <textarea type="text" name="message_en" class="form-control" required> {{ old('message_en') }} </textarea>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.message_ar')</label>
                                    <textarea type="text" name="message_ar" class="form-control" required>{{ old('message_ar') }} </textarea>
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
