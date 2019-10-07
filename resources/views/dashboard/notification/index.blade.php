@extends('layouts.dashboard.app')

@section('title',$title)
@push('css')
    <style>
        .switchery > small {
            background: #fff;
            border-radius: 100%;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
            height: 30px;
            position: absolute;
            top: 0;
            width: 30px;
        }

        .switchery-small > small {
            height: 20px;
            width: 20px;
        }

        .switchery {
            background-color: #fff;
            border: 1px solid #dfdfdf;
            border-radius: 20px;
            cursor: pointer;
            display: inline-block;
            height: 30px;
            position: relative;
            vertical-align: middle;
            width: 50px;
            -moz-user-select: none;
            -khtml-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
            box-sizing: content-box;
            background-clip: content-box;
            float: right;
        }

        .switchery-small {
            border-radius: 20px;
            height: 20px;
            width: 33px;
        }

        .right-to-left .panel-heading-controls > * {
            float: right;
        }

        .panel-heading {
            background: #fafafa;
            border-bottom: 2px solid #ececec;
            padding-bottom: 9px;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 11px;
            position: relative;
        }

        .panel-heading {
            padding: 10px 15px;
            border-bottom: 1px solid transparent;
            border-top-right-radius: 1px;
            border-top-left-radius: 1px;
        }

        .panel-heading-controls {
            float: left;
        }
        dataTableBuilder_filter{
            display: none;
        }
    </style>
@endpush()
@section('content')
    {{--    update commit github--}}

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('admin.notifications')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> @lang('admin.dashboard')</a></li>
                <li class="active">@lang('admin.notifications')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">


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
