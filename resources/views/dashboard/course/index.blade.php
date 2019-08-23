@extends('layouts.dashboard.app')

@section('title',$title)
@section('content')
    {{--    update commit github--}}

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('admin.course')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> @lang('admin.dashboard')</a></li>
                <li class="active">@lang('admin.course')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('admin.course')
                        <small>{{ $courses->total() }}</small>
                    </h3>

                    <form action="{{ route('dashboard.course.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control"
                                       placeholder="@lang('admin.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i
                                            class="fa fa-search"></i> @lang('admin.search')</button>
                                {{--                                @if (auth()->user()->hasPermission('create_users'))--}}
                                <a href="{{ route('dashboard.course.create') }}" class="btn btn-primary"><i
                                            class="fa fa-plus"></i> @lang('admin.add')</a>
                                {{--                                @else--}}
                                {{--                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('admin.add')</a>--}}
                                {{--                                @endif--}}
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($courses->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>

                                <th>@lang('admin.title')</th>
                                <th>@lang('admin.image')</th>
                                <th>@lang('admin.crated_at')</th>
                                <th>@lang('admin.action')</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($courses as $index=>$course)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td> {{ $course['title_'.app()->getLocale()]}}</td>
                                    <td><img class="img-fluid" width="50px" height="50px" style="border-radius: 50%"
                                                src="{{url('storage/'.$course->image->file_path)}}"></td>
                                    <td>{{ $course->created_at}}</td>
                                    <td>
                                        {{--                                        @if (auth()->user()->hasPermission('update_users'))--}}
                                        <a href="{{ route('dashboard.course.edit', $course->id) }}"
                                           class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('admin.edit')
                                        </a>
                                        {{--                                        @else--}}
                                        {{--                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('admin.edit')</a>--}}
                                        {{--                                        @endif--}}
                                        {{--                                        @if (auth()->user()->hasPermission('delete_users'))--}}
                                        <form action="{{ route('dashboard.course.destroy', $course->id) }}"
                                              method="post" style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger delete btn-sm"><i
                                                        class="fa fa-trash"></i> @lang('admin.delete')</button>
                                        </form><!-- end of form -->
                                        {{--                                        @else--}}
                                        {{--                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('admin.delete')</button>--}}
                                        {{--                                        @endif--}}
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table><!-- end of table -->

                        {{ $courses->appends(request()->query())->links() }}

                    @else

                        <h2>@lang('admin.no_data_found')</h2>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
