<div class="modal fade slide-up " id="show" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                class="pg-close fs-14"></i></button>
                    <h5 class="title">@lang('admin.show')
                    </h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="{{--{{route('exam.store',['slug'=>$slug])}}--}}"
                          autocomplete="off"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group-attached">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label>@lang('course.title_ar'):</label>
                                                <input name="title_ar" type="text" class="form-control"
                                                       value="{{$exam->title_ar}}" disabled required>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label>@lang('course.title_en'):</label>
                                                <input name="title_en" type="text" class="form-control"
                                                       value="{{$exam->title_en}}" disabled required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        @foreach($exam->option_exam as $option)
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    @if($loop->index == 0)
                                                        <label>@lang('course.answers_ar'):</label>
                                                    @endif
                                                    <div class="input-group">

                                             <span class="input-group-addon">

                                              <input type="radio" name="is_correct"
                                                     {{$option->is_correct?'checked':''}} disabled
                                                     value="{{$loop->index}}">
                                                          </span>
                                                        <input type="text" disabled name="value_ar[]"
                                                               value="{{$option->value_ar}}" class="form-control">
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <div class="col-lg-6">
                                                    @if($loop->index == 0)
                                                        <label>@lang('course.answers_en'):</label>
                                                    @endif
                                                    <div class="input-group">
                                             <span class="input-group-addon">
                                                          </span>
                                                        <input type="text" disabled name="value_en[]"
                                                               value="{{$option->value_en}}" class="form-control">
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>

                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                            </div>
                            {{--
                                                        <div class="row btn-div mt-3">
                                                            <div class="col-md-12 m-t-10 sm-m-t-10 m-auto btn-div">
                                                                <button type="submit"
                                                                        class="btn btn-primary">@lang('admin.add')</button>
                                                                <button type="reset" class="btn btn-danger"
                                                                        data-dismiss="modal">@lang('admin.cancel')
                                                                </button>
                                                            </div>
                                                        </div>--}}
                            <div class="row btn-close-temp">
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
