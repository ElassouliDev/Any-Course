@extends('layouts.layout')


@section('content')
    <div class="container ">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new" >@lang('course.new_question')</button>


        <div class="row bg-light pt-2 px-1">
            <div class="col-md-12 border border-bottom">
                <img class="img-fluid img-rounded" src="{{url('storage\image\user.jpeg')}}"
                     style="width: 50px;height: 50px; border-radius: 50%">
                <span class=""> yehia elassouli</span>
            </div>
             <div class="divider"></div>
            <div class="col-md-12 lead ">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, alias aliquid at aut doloremque
                fuga fugiat,
                illum in modi nesciunt perspiciatis unde ut! Aspernatur aut commodi consectetur iste perferendis quos.
            </div>
        </div>
    </div>
{{--    <div class="modal-body" id="new">
        <h5>@lang('course.new_question')</h5>
        <div class="row">
            <div class="col-12">
                <label>@lang('course.content_question')</label>
                <textarea class="w-100" rows="4"></textarea>
            </div>
        </div>
        <p>This <a href="#" role="button" class="btn btn-secondary popover-test" title="Popover title" data-content="Popover body content is set in this attribute.">button</a> triggers a popover on click.</p>
        <hr>
        <h5>Tooltips in a modal</h5>
        <p><a href="#" class="tooltip-test" title="Tooltip">This link</a> and <a href="#" class="tooltip-test" title="Tooltip">that link</a> have tooltips on hover.</p>
    </div>--}}


    <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('course.new_question')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('new_question')}}">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="col-form-label">@lang('course.title'):</label>
                            <input type="text" name="title" class="form-control" id="title" required>
                            <input type="hidden" name='lesson_id' value="{{$lesson_id}}">
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-form-label">@lang('course.content'):</label>
                            <textarea class="form-control"  rows="4" name="content" id="content" required></textarea>
                        </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">@lang('admin.cancel')</button>
                        <button type="submit" class="btn btn-primary">@lang('admin.add')</button>
                    </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@stop
@push('js')
<script>
    $(document).on('submit', '#new form', function (event) {

        event.preventDefault();
        var $this = $(this);
        // notifications.loading.show();

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
            $('#new').modal('hide');
            /*http.success(response, true);
            $('.checkAll').prop("checked", false);

            $('#dataTable').DataTable().ajax.reload();*/
        });
        request.fail(function (response, exception) {
            http.fail(JSON.parse(response.responseText), true);
        });
    });
</script>
@endpush