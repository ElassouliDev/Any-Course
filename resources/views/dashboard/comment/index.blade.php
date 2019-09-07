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
    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('admin.question')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> @lang('admin.dashboard')</a></li>
                <li class="active">@lang('admin.question')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">
                {{--<div class="datatable-filters rtl panel">
                    <div class="panel-heading clearfix"><span class="panel-title">@lang('admin.lesson')
                            --}}{{--<small>{{ $lessons->total() }}</small>--}}{{--</span>
                        <div class="panel-heading-controls">
                               <span class="switchery switchery-small"
                                     style="transition: border 0.4s ease 0s,
                                      box-shadow 0.4s ease 0s, background-color 1.2s ease 0s;
                                      box-shadow: rgb(223, 223, 223) 0px 0px 0px 0px inset; border-color: rgb(223, 223, 223);
                                      background-color: rgb(255, 255, 255);">
                                    <small style="left: 16px; transition: background-color 0.4s ease 0s,
                                     left 0.2s ease 0s; background-color: rgb(255, 255, 255);"></small>
                                </span>
                        </div>
                    </div>
                    <div class="panel-body clearfix" style="display: block;">
                        <div class="row"></div>
                        <div class="col-lg-2 col-md-3 col-sm-4">
                            <label class="input-group">@lang('admin.title_'.app()->getLocale()):</label>
                            <input col-id="0" class="form-control " placeholder=""
                                   autocomplete="off">
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4">
                            <label class="input-group">@lang('admin.course'):</label>
                            <input col-id="2" class="form-control " placeholder=""
                                   autocomplete="off">
                        </div>
                        --}}{{--  <div class="col-lg-2 col-md-3 col-sm-4">
                              <label class="input-group">@lang('admin.email'):</label>
                              <input col-id="2" class="form-control " placeholder=""
                                     autocomplete="off">
                          </div>
                          <div class="col-lg-2 col-md-3 col-sm-4">
                              <label class="input-group">@lang('admin.status'):</label>
                              <select col-id="3" class="form-control ">
                                  <option value=""></option>
                                  <option value="1">@lang('admin.user_status1')</option>
                                  <option value="0">@lang('admin.user_status2')</option>
                              </select>
                          </div>--}}{{--
                    </div>
                </div>--}}
                  <div class="box-header with-border">

                      {{--<h3 class="box-title" style="margin-bottom: 15px">@lang('admin.lesson')
                          <small>{{ $lessons->total() }}</small>
                      </h3>--}}

                      <form action="{{ route('dashboard.question.index') }}" method="get">

                          <div class="row">

                              {{--<div class="col-md-4">--}}
                                  {{--<input type="text" name="search" class="form-control"--}}
                                         {{--placeholder="@lang('admin.search')" >--}}
                              {{--</div>--}}

                              <div class="col-md-4">
                                  <button type="submit" class="btn btn-primary"><i
                                              class="fa fa-search"></i> @lang('admin.search')</button>
                                                                  @if (auth()->user()->hasPermission('create_questions'))
                                  <a href="{{ route('dashboard.question.create') }}" class="btn btn-primary"><i
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

    <script>

        window.onload = function () {
            var table = $('#dataTableBuilder').DataTable();


            {{--var table = '{{$dataTable}}';--}}

            $('.datatable-filters .switchery').click(function () {
                if ($('.datatable-filters .panel-body').is(':hidden')) {
                    $('.datatable-filters .panel-heading-controls span small').css({
                        'left': '16px',
                    });
                } else {
                    $('.datatable-filters .panel-heading-controls span small').css({
                        'left': '0px',
                    });
                }
                $('.datatable-filters .panel-body').slideToggle(300);
            });

            $('.datatable-filters input ,.datatable-filters select').on('keyup change , change', function () {
                word = $(this).val();
                col_index = $(this).attr('col-id');

                if (table.columns().search() !== word) {
                    table.columns()
                        .search(word)
                        .draw();
                }

                $.fn.dataTable.ext.search.pop();

            });
        }
    </script>

@endpush
    {{--
    @section('javascript')
        <script>

            window.onload = function () {


                // var table = $('datatable').datatable();


                $('.datatable-filters .switchery').click(function () {
                    if ($('.datatable-filters .panel-body').is(':hidden')) {
                        $('.datatable-filters .panel-heading-controls span small').css({
                            'left': '16px',
                        });
                    } else {
                        $('.datatable-filters .panel-heading-controls span small').css({
                            'left': '0px',
                        });
                    }
                    $('.datatable-filters .panel-body').slideToggle(300);
                });

                $('.datatable-filters input ,.datatable-filters select').on('keyup change , change', function () {
                    word = $(this).val();
                    col_index = $(this).attr('col-id');

                    if (table.columns(col_index).search() !== word) {
                        table.columns(col_index)
                            .search(word)
                            .draw();
                    }

                    $.fn.dataTable.ext.search.pop();

                });
            }
        </script>
    @stop
    --}}
