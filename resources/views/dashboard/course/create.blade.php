@extends('layouts.dashboard.app')
@section('title',$title)
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css" rel="stylesheet" />
    @endpush

@section('content')
    {{--    update commit github--}}

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('admin.course')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> @lang('admin.dashboard')</a></li>
                <li><a href="{{ route('dashboard.course.index') }}"> @lang('admin.course')</a></li>
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

                    <form data-parsley-validate action="{{ route('dashboard.course.store') }}" method="post" enctype="multipart/form-data" id="course_form">

                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.title_ar')</label>
                                    <input type="text" name="title_ar" class="form-control"
                                           value="{{ old('title_ar') }}" required>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.title_en')</label>
                                    <input type="text" name="title_en" class="form-control"
                                           value="{{ old('title_en') }}" required>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.category')</label>
                                    <select name="category_id"  required value='{{old('category_id')}}' class="form-control">
                                        <option value="-1">-- @lang('admin.SelectCategory')--</option>

                                        @foreach($mainCategories as $category)
                                            <option value="{{ $category->id }}" disabled="disabled">{{ $category['title_'.app()->getLocale()] }}</option>
                                            @foreach($subCategories as $subCategory)
                                                @if($subCategory->parent == $category->id)
                                                    <option value="{{ $subCategory->id }}">
                                                        -- {{$subCategory['title_'.app()->getLocale()]}}
                                                    </option>
                                                @endif
                                            @endforeach
                                        @endforeach


                                    </select>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.isPaid')</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <select class="form-control" required value='{{old('is_paid')}}' name="is_paid">
                                                <option value="-1">-- @lang('admin.selectPaid')--</option>
                                                <option value="0">@lang('admin.free')</option>
                                                <option value="1">@lang('admin.paid')</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">

                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input type="number" min="0" class="form-control">
                                                </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.description_ar')</label>
                                    <textarea rows="6" name="description_ar"
                                              class="form-control" required>{{ old('description_ar') }}</textarea>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.description_en')</label>
                                    <textarea rows="6" name="description_en"
                                              class="form-control" required>{{ old('description_en') }}</textarea>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.tag')</label>
                                    <select required value='{{old('tags')}}' class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag['name_'.app()->getLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group" required>
                                    <label>@lang('admin.image')</label>
                                    <input type="file" class="form-control" name="image" accept="image/*">
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
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
            $('#course_form').validate()/*	.parsley()*/;
        });
    </script>
@endpush
