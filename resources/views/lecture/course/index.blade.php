@extends('layouts.layout')
@section('title', $title)
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.5/css/froala_editor.pkgd.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.0.5/js/froala_editor.pkgd.min.js"></script>
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
                        <form id="demo-form" data-parsley-validate="" role="form" method="post" action="{{route('course_lecture.store')}}" autocomplete="off"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group-attached">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">@lang('course.basic information')</a>
                                        <a class="nav-item nav-link" id="nav-description-tab" data-toggle="tab" href="#nav-description" role="tab" aria-controls="nav-description" aria-selected="false">@lang('course.description')</a>
                                    </div>
                                </nav>
                                <div class="tab-content border-0"  id="nav-tabContent">
                                    <div class="tab-pane fade show active"  id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-default">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <label>@lang('admin.title_ar'):</label>
                                                            <input name="title_ar" data-parsley-palindrome="" type="text" class="form-control" required>
                                                        </div>
                                                        <div class="col-md-6  col-sm-12">
                                                            <label>@lang('admin.title_en'):</label>
                                                            <input name="title_en" data-parsley-palindrome=""  type="text" class="form-control" required>
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
                                                            <select  id="heard"  data-parsley-palindrome=""  name="category_id" class="form-control" required>
                                                                <option value="">-- @lang('admin.SelectCategory') --</option>
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
                                                            <div class="form-group"><label for="isPaid">@lang('admin.isPaid')</label>
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <select id="isPaid" data-parsley-palindrome=""  data-parsley-trigger="change"  class="form-control" required
                                                                                value='{{old('is_paid')}}'
                                                                                name="is_paid">
                                                                            <option value="">
                                                                                -- @lang('admin.selectPaid')--
                                                                            </option>
                                                                            <option value="0">@lang('admin.free')</option>
                                                                            <option value="1">@lang('admin.paid')</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">

                                                                        <div class="input-group">
                                                                            <span class="input-group-addon">$</span>
                                                                            <input type="number" name="price" min="0"
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
                                                        <input type="file" required="" data-parsley-palindrome=""
                                                               onchange="this.form.filename.value = this.files.length ? this.files[0].name : ''"
                                                               class="custom-file-input bg-secondary hide"
                                                               name="image" id="image-course">
                                                        <input type="text" name="filename" class="form-control w-75 float-left"
                                                               placeholder="No file selected" readonly>
                                                        <label id="customFile"
                                                               class="custom-file-label float-left btn btn-outline-primary w-25"
                                                               for="customFile">@lang('course.Choose image')</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-default">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>@lang('admin.description_ar'):</label>
                                                            <textarea rows="4" name="description_ar"

                                                                        id="example">
 <ul class="nav row">
                                    <li class="nav-item col-md-6">
                                        <span><i class="fa fa-check"></i> Make pretty much any Android app you like (your only limit is your imagination)</span>
                                    </li>
                                    <li class="nav-item col-md-6">
                                        <span><i class="fa fa-check"></i> Submit your apps to Google Play and generate revenue with Google Pay and Google Ads</span>
                                    </li>
                                    <li class="nav-item col-md-6">
                                        <span><i class="fa fa-check"></i> Become a professional app developer, take freelance gigs and work from anywhere in the world</span>
                                    </li>
                                    <li class="nav-item col-md-6">
                                        <span><i class="fa fa-check"></i> Bored with the same old, same old? Apply for a new job in a software company as an Android developer</span>
                                    </li>
                                </ul>

                                                            </textarea>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">


                                                            <label>@lang('admin.description_en'):</label>
                                                            <textarea  name="description_en" id="example">
                                                                <ul class="nav row">
                                                                    <li class="nav-item col-md-6">
                                                                        <span><i class="fa fa-check"></i> Make pretty much any Android app you like (your only limit is your imagination)</span>
                                                                    </li>
                                                                    <li class="nav-item col-md-6">
                                                                        <span><i class="fa fa-check"></i> Submit your apps to Google Play and generate revenue with Google Pay and Google Ads</span>
                                                                    </li>
                                                                    <li class="nav-item col-md-6">
                                                                        <span><i class="fa fa-check"></i> Become a professional app developer, take freelance gigs and work from anywhere in the world</span>
                                                                    </li>
                                                                    <li class="nav-item col-md-6">
                                                                        <span><i class="fa fa-check"></i> Bored with the same old, same old? Apply for a new job in a software company as an Android developer</span>
                                                                    </li>
                                                                </ul>
                                                            </textarea>
                                                        </div>
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
            });
            request.fail(function (response, exception) {

            });
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
