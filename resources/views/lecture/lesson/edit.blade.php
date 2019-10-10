<div class="modal fade" id="update" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">@lang('course.edit_lesson')</h4>
            </div>
            <div class="modal-body">
                <form id="demo-form" data-parsley-validate="" action="{{route('lesson.update',[$lesson->course['slug_'.app()->getLocale()],$lesson['slug_'.app()->getLocale()]])}}" method="post">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="title_ar">@lang('admin.title_ar')</label>
                                        <input id="title_ar" class="form-control" style="background: #fff"
                                               name="title_ar" required value="{{$lesson->title_ar}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="title_en">@lang('admin.title_en')</label>
                                        <input id="title_en" class="form-control" style="background: #fff"
                                               name="title_en" required value="{{$lesson->title_en}}">
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
                                        <label for="file_path">@lang('admin.file_path')</label>
                                        <input id="file_path" class="form-control" style="background: #fff"
                                               name="file_path" required value="{{$lesson->file->file_path}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">@lang('admin.add')</button>
                    </div>
                </form>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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
