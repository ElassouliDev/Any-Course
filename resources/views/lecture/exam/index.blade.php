@extends('layouts.layout')
@section('title', $title)
@push('css')
    <style>
        #dataTableBuilder_wrapper,table,
        form .select2-container--default.select2-container--disabled,
        form .select2.select2-container.select2-container--default.select2-container--focus {
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
                            @lang('course.exam_lesson')
                        </h3>

                    </div>
                </div>

            </div>
            <div class="row px-5 py-2 pb-5">

                <div class="col-md-4">
                    <input type="text" name="search" class="form-control"
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
            <input type="hidden"name="course_id" value="{{$course_id}}">

        </div>
    </div>



    <div class="modal fade slide-up " id="new" role="dialog" aria-hidden="false">
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
                        <form role="form" method="post" action="{{route('exam.store',['course_id'=>$course_id])}}" autocomplete="off"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group-attached">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <label>@lang('course.title_ar'):</label>
                                                    <input name="title_ar" type="text" class="form-control" required>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <label>@lang('course.title_en'):</label>
                                                    <input name="title_en" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <div class="row">

                                            <div class="col-lg-6">
                                                <label>@lang('course.answers_ar'):</label>
                                                <div class="input-group">

                                             <span class="input-group-addon">

                                              <input type="radio" name="is_correct" value="0">
                                                          </span>
                                                    <input type="text" name="value_ar[]" class="form-control">
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                                <div class="col-lg-6">
                                                    <label>@lang('course.answers_en'):</label>

                                                    <div class="input-group">
                                             <span class="input-group-addon">
                                                          </span>
                                                        <input type="text" name="value_en[]" class="form-control">
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="input-group">

                                             <span class="input-group-addon">

                                              <input type="radio" name="is_correct" value="1">
                                                          </span>
                                                        <input type="text" name="value_ar[]" class="form-control">
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="input-group">
                                             <span class="input-group-addon">
                                                          </span>
                                                        <input type="text" name="value_en[]" class="form-control">
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="input-group">

                                             <span class="input-group-addon">

                                              <input type="radio" name="is_correct" value="2" >
                                                          </span>
                                                        <input type="text" name="value_ar[]" class="form-control">
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="input-group">
                                             <span class="input-group-addon">
                                                          </span>
                                                        <input type="text" name="value_en[]" class="form-control">
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="input-group">

                                             <span class="input-group-addon">

                                              <input type="radio" name="is_correct" value="3">
                                                          </span>
                                                        <input type="text" name="value_ar[]" class="form-control">
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="input-group">
                                             <span class="input-group-addon">
                                                          </span>
                                                        <input type="text" name="value_en[]" class="form-control">
                                                    </div>
                                                    <!-- /input-group -->
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
                                {{--     <div class="row btn-close-temp" style="display: none">
                                         <div class="col-md-12 m-t-10 sm-m-t-10 m-auto">
                                             <button type="reset" class="btn btn-primary" style="width: 100%"
                                                     data-dismiss="modal">@lang('admin.close')
                                             </button>
                                         </div>
                                     </div>--}}
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
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script>

        $(document).on('click', '[data-action="new"]', function () {
            // resetFormProductData($('#new-product'));
            $('#new').modal('show');
        });
        $(document).on('click', '#customFile', function () {
            // resetFormProductData($('#new-product'));
            $('#image-course').click();
        });
        $(document).on('click', '.reset_show', function () {
            // resetFormProductData($('#new-product'));
            $('#show').modal('hide');
            $('#show').remove();
            $('.modal-backdrop.fade.show').remove();
        });


        ////////////// ------------------------------  create  course
        $(document).on('submit', '#new form', function (event) {
            event.preventDefault();
            var $this = $(this);
            // notifications.loading.show();

            var url = $(this).attr('action'),
                request = $.ajax({
                    url: url,
                    method: "post",
                    data: new FormData(this),
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false
                });
            request.done(function (response) {
                $('#new [type="reset"]').click();
                $('#new').modal('hide');
                http.success(response, true);

                $('#dataTableBuilder').DataTable().ajax.reload();
            });
            request.fail(function (response, exception) {
                // http.fail(JSON.parse(response.responseText), true);
            });
        });
        $(document).on('click', '[data-action="show"]', function () {
            // notifications.loading.show();

            var url = $(this).attr('data-link'),
                request = $.ajax({
                    url: url,
                    method: "get",
                    data: [],
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false
                });
            request.done(function (response) {
                $('html').append(response.show);
                $('#show').modal('show');
                $('.js-example-basic-multiple').select2();

                // $('#growls').remove();

                http.success(response,true);
            });
            request.fail(function (response, exception) {
                // /$('#growls').remove();

                // http.fail(JSON.parse(response.responseText), true);
            });
        });

    </script>

@endpush
