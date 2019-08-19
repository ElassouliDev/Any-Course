

@extends('layouts.dashboard.app')
@section('title',$title)

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('admin.settings')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> @lang('admin.dashboard')</a></li>
                <li class="active">@lang('admin.settings')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('admin.settings') <small>{{ $settings->total() }}</small></h3>

                    <form action="{{ route('dashboard.settings.index') }}" method="get">
                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('admin.search')" value="{{old('search')}}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('admin.search')</button>
                                @if (auth()->user()->hasPermission('create_settings'))
                                    <a href="{{ route('dashboard.settings.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('admin.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('admin.add')</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($settings->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('admin.key')</th>
                                <th>@lang('admin.value')</th>
                                <th>@lang('admin.action')</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($settings as $index=>$setting)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $setting->key }}</td>
                                    <td>{{ $setting->value }}</td>
                                    <td>
                                        @if (auth()->user()->hasPermission('update_settings'))
                                            <a href="{{ route('dashboard.settings.edit', $setting->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('admin.edit')</a>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('admin.edit')</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('delete_settings'))
                                            <form action="{{ route('dashboard.settings.destroy', $setting->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('admin.delete')</button>
                                            </form><!-- end of form -->
                                        @else
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('admin.delete')</button>
                                        @endif
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table><!-- end of table -->

                        {{ $settings->appends(request()->query())->links() }}

                    @else

                        <h2>@lang('admin.no_data_found')</h2>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
