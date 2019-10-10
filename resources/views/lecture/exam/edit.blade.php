<div class="modal fade slide-up new" id="show" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                class="pg-close fs-14"></i></button>
                    <h5 class="title">@lang('admin.edit')
                    </h5>
                </div>
                <div class="modal-body">
                    <form role="form" id="demo-form" data-parsley-validate="" method="post" action="{{route('exam.update',[$exam->course_id,$exam->id])}}"
                          autocomplete="off"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group-attached">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label>@lang('course.title_ar'):</label>
                                                <input name="title_ar" type="text" class="form-control"
                                                       value="{{$exam->title_ar}}" required data-parsley-validate="">
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label>@lang('course.title_en'):</label>
                                                <input name="title_en" type="text" class="form-control"
                                                       value="{{$exam->title_en}}" required data-parsley-validate="">
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
                                                     {{$option->is_correct?'checked':''}} value="{{$loop->index}}" required>
                                                          </span>
                                                        <input type="text" name="value_ar[]"
                                                               value="{{$option->value_ar}}" class="form-control" required>
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
                                                        <input type="text" name="value_en[]"
                                                               value="{{$option->value_en}}" class="form-control" required>
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row btn-div mt-3">
                                <div class="col-md-12 m-t-10 sm-m-t-10 m-auto btn-div">
                                    <button type="submit"
                                            class="btn btn-primary">@lang('admin.save')</button>
                                    <button type="reset" class="btn btn-danger"
                                            data-dismiss="modal">@lang('admin.cancel')
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
