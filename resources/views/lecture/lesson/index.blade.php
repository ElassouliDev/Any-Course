@extends('layouts.layout')
@section('title', $title)
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css" rel="stylesheet"/>
    <style>
        div#dataTableBuilder_wrapper {
            width: 100%;
        }
        table#dataTableBuilder,
        span.select2.select2-container.select2-container--default,
        span.select2.select2-container.select2-container--default.select2-container--above,
        span.select2-container--default.select2-container--disabled,
        span.select2.select2-container.select2-container--default.select2-container--focus{
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
                        <form role="form" method="post" action="{{route('course_lecture.store')}}" autocomplete="off"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group-attached">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <label>@lang('admin.title_ar'):</label>
                                                    <input name="title_ar" type="text" class="form-control" required>
                                                </div>
                                                <div class="col-md-6  col-sm-12">
                                                    <label>@lang('admin.title_en'):</label>
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
                                                <div class="col-md-6  col-sm-12">
                                                    <label>@lang('admin.category'):</label>
                                                    <select name="category_id" class="form-control"
                                                            required>
                                                        <option value="-1">-- @lang('admin.SelectCategory') --</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                    disabled="disabled">{{ $category['title_'.app()->getLocale()] }}</option>
                                                            @foreach($category->subCategories as $subCategory)
                                                                <option value="{{ $subCategory->id }}">
                                                                    -- {{$subCategory['title_'.app()->getLocale()]}}
                                                                </option>
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6  col-sm-12">
                                                    <div class="form-group"><label>@lang('admin.isPaid')</label>
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <select class="form-control" required
                                                                        value='{{old('is_paid')}}'
                                                                        name="is_paid">
                                                                    <option value="-1">
                                                                        -- @lang('admin.selectPaid')--
                                                                    </option>
                                                                    <option value="0">@lang('admin.free')</option>
                                                                    <option value="1">@lang('admin.paid')</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">

                                                                <div class="input-group">
                                                                    <span class="input-group-addon">$</span>
                                                                    <input type="number" min="0"
                                                                           class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <label>@lang('admin.description_ar'):</label>
                                                    <textarea rows="4" name="description_ar"
                                                              style="resize: none"
                                                              class="form-control" required></textarea>
                                                </div>
                                                <div class="col-md-6  col-sm-12">
                                                    <label>@lang('admin.description_en'):</label>
                                                    <textarea rows="4" name="description_en"
                                                              style="resize: none"
                                                              class="form-control" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <div class="row">
                                                <div class="col-md-12 w-100">

                                                    <label for="tag">@lang('admin.tag')</label>
                                                    <select id="tag" required
                                                            class="js-example-basic-multiple form-control w-100"
                                                            name="tags[]" multiple="multiple">

                                                        @foreach($tags as $tag)
                                                            <option value="{{$tag->id}}">{{$tag['name_'.app()->getLocale()]}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row px-2">
                                    <div class="col-md-12 clear">
                                        <div class="row px-3">
                                            <div class="col-md-l2 image-div w-100">
                                                <input type="file"
                                                       onchange="this.form.filename.value = this.files.length ? this.files[0].name : ''"
                                                       class="custom-file-input bg-secondary hide"
                                                       name="image" id="image-course">
                                                <input type="text" name="filename" class="form-control w-75 float-left"
                                                       placeholder="No file selected" readonly>
                                                <label id="customFile"
                                                       class="custom-file-label float-left btn btn-outline-primary w-25"
                                                       for="customFile">Choose file</label>
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


        //////////////// ------------------------------  create  course
        $(document).on('submit', 'form', function (event) {
            event.preventDefault();
            var $this = $(this);
            notifications.loading.show();

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
                $this.find('[type="reset"]').click();
                $('.new').modal('hide');
                http.success(response, true);
                $('#dataTableBuilder').DataTable().ajax.reload();
            });
            request.fail(function (response, exception) {
                 http.fail(JSON.parse(response.responseText), true);
            });
        });
        $(document).on('click', '[data-action="show"]', function () {
            notifications.loading.show();
            $('#show').remove();
            $('.modal-backdrop.fade.show').remove();

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

                // http.success(response, false);
            });
            request.fail(function (response, exception) {
                // /$('#growls').remove();

                // http.fail(JSON.parse(response.responseText), true);
            });
        });

    </script>

@endpush
