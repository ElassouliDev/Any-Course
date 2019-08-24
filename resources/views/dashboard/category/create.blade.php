@extends('layouts.dashboard.app')
@section('title',$title)

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('admin.category')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> @lang('admin.dashboard')</a></li>
                <li><a href="{{ route('dashboard.category.index') }}"> @lang('admin.category')</a></li>
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

                    <form action="{{ route('dashboard.category.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('admin.parent')</label>
                                    <select name="parent" class="form-control">
                                        <option value="0">-- @lang('admin.SelectParent')--</option>

                                        @foreach($parents as $parent)
                                            <option value="{{$parent->id}}">{{$parent['title_'.app()->getLocale()]}}</option>
                                        @endforeach

                                    </select>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('admin.title_en')</label>
                            <input type="text" name="title_en" class="form-control" value="{{ old('title_en') }}">
                        </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                            <label>@lang('admin.title_ar')</label>
                            <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar') }}">
                        </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('admin.description_en')</label>
                            <textarea name="description_en" class="form-control" >{{ old('description_en') }}</textarea>

                        </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('admin.description_ar')</label>
                                <textarea name="description_ar" class="form-control" >{{ old('description_ar') }}</textarea>
                        </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('admin.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
