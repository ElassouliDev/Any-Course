@extends('layouts.dashboard.app')

@section('title',$title)
@section('content')
    {{--    update commit github--}}

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('admin.courses')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> @lang('admin.dashboard')</a></li>
                <li class="active">@lang('admin.courses')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('admin.courses')
                        {{--                        <small>{{ $course->total() }}</small>--}}
                    </h3/>

                    <form action="{{ route('dashboard.course.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control"
                                       placeholder="@lang('admin.search')" >
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i
                                        class="fa fa-search"></i> @lang('admin.search')</button>
                                                                @if (auth()->user()->hasPermission('create_courses'))
                                <a href="{{ route('dashboard.course.create') }}" class="btn btn-primary"><i
                                        class="fa fa-plus"></i> @lang('admin.add')</a>
                                                                @else
                                                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('admin.add')</a>
                                                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body portlet-body table-responsive">

                    {!! $dataTable->table(["class"=> "table table-striped table-bordered table-hover table-checkable no-footer"],true) !!}




                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
@push('js')
    {!! $dataTable->scripts() !!}
@endpush
