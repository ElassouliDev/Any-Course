@extends('layouts.dashboard.app')

@section('title',$title)
@section('content')
    {{--    update commit github--}}

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('admin.category')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> @lang('admin.dashboard')</a></li>
                <li class="active">@lang('admin.category')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('admin.category')
                        {{--                        <small>{{ $categorys->total() }}</small>--}}
                    </h3>



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
