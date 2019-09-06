@extends('layouts.layout')
@section('title', $title)
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
                           placeholder="@lang('admin.search')" >
                </div>

                <div class="col-md-4">

                    {{--@if (auth()->user()->hasPermission('create_courses'))--}}
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Launch demo modal
                    </button>
                            <a href="#" data-toggle="modal" data-target="#new" data-action="new" {{-- href="{{ route('dashboard.course.create') }}" --}} class="btn btn-primary">
                            @lang('admin.add') <i class="fa fa-plus p-2" style="font-size: 10px"></i></a>
                 {{--   @else
                        <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('admin.add')</a>
                    @endif--}}
                </div>

            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form role="form" action="{{route('course_lecture')}}" autocomplete="off"
                              enctype="multipart/form-data">
                            <span class="change_method_form"></span>
                            <div class="form-group-attached">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <label>@lang('admin.product_name_ar'):</label>
                                                    <input name="name_ar" type="text" class="form-control" required>
                                                </div>
                                                <div class="col-md-6  col-sm-12">
                                                    <label>@lang('admin.product_name_en'):</label>
                                                    <input name="name_en" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <label>@lang('admin.brand_name'):</label>
                                                                <input name="brand_name" type="text"
                                                                       class="form-control" required>
                                                            </div>
                                                            <div class="col-md-6  col-sm-12">
                                                                <label>@lang('admin.category_type'):</label>
                                                                <select name="category" class="form-control" required>
                                                                    <option></option>
                                                                  {{--  @foreach($categories as $category)
                                                                        <option value="{{$category->id}}">{{$category['name_'.app()->getLocale()]}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>--}}
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
                                                    <label>@lang('admin.product_description_ar'):</label>
                                                    <textarea rows="4" name="description_ar" style="resize: none"
                                                              class="form-control" required></textarea>
                                                </div>
                                                <div class="col-md-6  col-sm-12">
                                                    <label>@lang('admin.product_description_en'):</label>
                                                    <textarea rows="4" name="description_en" style="resize: none"
                                                              class="form-control" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="form-group image-div">

                                            <div class="custom-file input-group col-md-12">
                                                <input type="text" name="filename" class="form-control"
                                                       placeholder="No file selected" readonly>

                                                <div class="input-group-btn ">
                                                    <div class="btn btn-default  custom-file-uploader">

                                                        <input type="file" id="image-product" required name="image" accept="image/jpeg"
                                                               onchange="this.form.filename.value = this.files.length ? this.files[0].name : ''"/>
                                                        @lang('admin.image_product')
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="image-product-view">
                                            <div class="row"
                                                 style="padding: 3px 14px;overflow: auto;max-height: 180px;">

                                                <div class="new-image col-lg-3 col-md-4 col-sm-6 "
                                                     style="padding:6px 5px">
                                                    <div style="
                                                            height: 70px;
                                                            background-image:url('{{url('storage/image/user/user.jpeg')}}');
                                                            background-size: 100% 100%;
                                                            background-repeat: no-repeat;
                                                            border: 2px solid #a8a7a7;
                                                            border-radius: 8px; position: relative">
                                                        <div class="text-center text-light"
                                                             style="position: absolute;left: 0;top: 0; width: 100%; height: 100%; background: rgba(0,0,0,.3) ">
                                                            <a class="text-light w-100 h-100 cancel_delete"
                                                               style="line-height: 62px;color: white">@lang('admin.return')</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group image-div">
                                            <div class="custom-file input-group col-md-12">
                                                <input type="text" name="filename_slider" class="form-control"
                                                       placeholder="No file selected" readonly>

                                                <div class="input-group-btn ">
                                                    <div class="btn btn-default  custom-file-uploader">

                                                        <input type="file" accept="image/jpeg" id="imgInp" required name="attachments[]"
                                                               multiple
                                                               onchange="this.form.filename_slider.value = this.files.length ? this.files.length + ' files' : ''"/>
                                                        @lang('admin.image_product_slider')

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="image-slider-view">
                                            <div class="row"
                                                 style="padding: 3px 14px;overflow: auto;max-height: 180px;">

                                                <div class="old-image col-lg-3 col-md-4 col-sm-6 "
                                                     style="padding:6px 5px">
                                                    <div style="
                                                            height: 70px;
                                                            background-image:url('{{url('storage/image/user/user.jpeg')}}');
                                                            background-size: 100% 100%;
                                                            background-repeat: no-repeat;
                                                            /*margin:  5px;*/
                                                            border: 2px solid #a8a7a7;
                                                            border-radius: 8px; position: relative">
                                                        <button type="button" class="bg-danger text-light close-image"
                                                                style="
                                                                border-radius: 50%;
                                                                border: none;
                                                                outline: none;
                                                                position: absolute;
                                                                right: -8px;
                                                                top: -8px;">&times;
                                                        </button>
                                                        <input type="hidden" name="image_id[]" value="1">
                                                    </div>
                                                </div>

                                                <div class="old-image col-lg-3 col-md-4 col-sm-6 "
                                                     style="padding:6px 5px">
                                                    <div style="
                                                            height: 70px;
                                                            background-image:url('{{url('storage/image/user/user.jpeg')}}');
                                                            background-size: 100% 100%;
                                                            background-repeat: no-repeat;
                                                            /*margin:  5px;*/
                                                            border: 2px solid #a8a7a7;
                                                            border-radius: 8px; position: relative">
                                                        <button type="button" class="bg-danger text-light close-image"
                                                                style="
                                                                border-radius: 50%;
                                                                border: none;
                                                                outline: none;
                                                                position: absolute;
                                                                right: -8px;
                                                                top: -8px;">&times;
                                                        </button>
                                                        <input type="checkbox" class="hidden" name="image_id[]"
                                                               value="1">
                                                        <div class="text-center text-light"
                                                             style="position: absolute;left: 0;top: 0; width: 100%; height: 100%; background: rgba(0,0,0,.3) ">
                                                            <a class="text-light w-100 h-100 cancel_delete"
                                                               style="line-height: 62px;color: white">@lang('admin.return')</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="row btn-div">
                                    <div class="col-md-12 m-t-10 sm-m-t-10 m-auto btn-div">
                                        <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
                                        <button type="reset" class="btn btn-danger"
                                                data-dismiss="modal">@lang('admin.cancel')
                                        </button>
                                    </div>
                                </div>
                                <div class="row btn-close-temp" style="display: none">
                                    <div class="col-md-12 m-t-10 sm-m-t-10 m-auto">
                                        <button type="reset" class="btn btn-primary" style="width: 100%"
                                                data-dismiss="modal">@lang('admin.close')
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
@push('js')
    {!! $dataTable->scripts() !!}

    <script>

        $(document).on('click', '[data-action="new"]', function () {
            alert();
            // resetFormProductData($('#new-product'));
            $('#new').modal('show');
        });

    </script>
@endpush
