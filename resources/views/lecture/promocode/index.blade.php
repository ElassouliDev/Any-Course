@extends('layouts.layout')
@section('title', $title)
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.5/css/froala_editor.pkgd.css" rel="stylesheet"
          type="text/css"/>
    <script type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/froala-editor@3.0.5/js/froala_editor.pkgd.min.js"></script>
    <style>
        div#dataTableBuilder_wrapper {
            width: 100%;
        }

        table#dataTableBuilder,
        span.select2.select2-container.select2-container--default,
        span.select2.select2-container.select2-container--default.select2-container--above,
        span.select2-container--default.select2-container--disabled,
        span.select2.select2-container.select2-container--default.select2-container--focus {
            width: 100% !important;
        }
    </style>
@endpush
@section('content')
    <div class="m-content">
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            @lang('course.lecture_course')
                        </h3>

                    </div>
                </div>

            </div>
            <div class="row px-5 py-2 pb-5">

                <div class="col-md-4">
                    <input type="text" name="search" id="search" class="form-control"
                           placeholder="@lang('admin.search')">
                </div>

                <div class="col-md-4">

                    {{--@if (auth()->user()->hasPermission('create_courses'))--}}

                    <a href="#" data-toggle="modal" data-target="#new" data-action="new"
                       class="btn btn-primary py-1 px-2 my-1">
                        @lang('admin.add') <i class="fa fa-plus" style="font-size: 10px"></i></a>
                    {{--   @else
                           <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('admin.add')</a>
                       @endif--}}
                </div>

            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row px-5 py-2 pb-5">
                {!! $dataTable->table(["class"=> "table table-striped table-bordered table-hover table-checkable no-footer"],true) !!}
            </div>
        </div>
    </div>



    <div class="modal fade slide-up new" id="new" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                    class="pg-close fs-14"></i></button>
                        <h5 class="title">@lang('admin.new')
                        </h5>
                    </div>
                    <div class="modal-body">
                        <form  id="demo-form" data-parsley-validate="" role="form" method="post" action="{{route('promocode.store')}}" autocomplete="off"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group-attached">
                                <div class="tab-content border-0" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                         aria-labelledby="nav-home-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-default">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <label>@lang('admin.amount'):</label>
                                                            <input name="amount" type="number" min="1"
                                                                   class="form-control" required>
                                                        </div>
                                                        <div class="col-md-12  col-sm-12">
                                                            <label>@lang('admin.description'):</label>
                                                            <textarea name="description"
                                                                      class="form-control" rows="4" ></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row btn-div mt-3">
                                            <div class="col-md-12 m-t-10 sm-m-t-10 m-auto btn-div">
                                                <button type="submit"
                                                        class="btn btn-primary">@lang('admin.add')</button>
                                                <button type="reset" class="btn btn-danger"
                                                        data-dismiss="modal">@lang('admin.cancel')
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    {!! $dataTable->scripts() !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script>
    <script>
        var editor = new FroalaEditor('#example');
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });


    </script>
    <script>

        $(document).on('click', '[data-action="new"]', function () {
            $('#new').modal('show');
        });

        $(document).on('click', '[type="reset"]', function () {
           $(this).parents('form').find('input , textarea').val('');
        });


   /*     $(document).on('click', '.reset_show', function () {
            // resetFormProductData($('#new-product'));
            $('#show').modal('hide');
            $('#show').remove();
            $('.modal-backdrop.fade.show').remove();
        });*/

        //////////////// ------------------------------  create  course
        $(document).on('submit', '#new form', function (event) {
            event.preventDefault();
            var $this = $(this);

            // notifications.loading.show();
            url = $(this).attr('action');
            $.post(url,$(this).serialize(),function (response) {
                $this.find('[type="reset"]').click();
                $('.new').modal('hide');
                http.success(response, true);
                $('#dataTableBuilder').DataTable().ajax.reload();

            }).fail(function (response, exception) {
                http.fail(JSON.parse(response.responseText), true);
            });

        });


    </script>

    <script type="text/javascript">
        $(function () {
            $('#demo-form').parsley().on('field:validated', function() {
                var ok = $('.parsley-error').length === 0;
                $('.bs-callout-info').toggleClass('hidden', !ok);
                $('.bs-callout-warning').toggleClass('hidden', ok);
            })
                .on('form:submit', function() {
                    return false; // Don't submit form for this demo
                });
        });
    </script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
@endpush
