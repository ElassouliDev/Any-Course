<div class="modal fade slide-up new overflow-auto" id="show" role="dialog" aria-hidden="false">

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
                    <form  id="demo-form" data-parsley-validate="" role="form" method="post" action="{{route('course_lecture.update')}}" autocomplete="off"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="slug" value="{{$course['slug_'.app()->getLocale()]}}">
                        <div class="form-group-attached">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home_edit-tab" data-toggle="tab" href="#nav-home_edit" role="tab" aria-controls="nav-home_edit" aria-selected="true">@lang('course.basic information')</a>
                                    <a class="nav-item nav-link" id="nav-description_edit-tab" data-toggle="tab" href="#nav-description_edit" role="tab" aria-controls="nav-description_edit" aria-selected="false">@lang('course.description')</a>
                                </div>
                            </nav>
                            <div class="tab-content border-0"  id="nav-tabContent">
                                <div class="tab-pane fade show active"  id="nav-home_edit" role="tabpanel" aria-labelledby="nav-home_edit-tab">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <label>@lang('admin.title_ar'):</label>
                                                        <input name="title_ar" type="text" value="{{$course->title_ar}}"
                                                               class="form-control" required="">
                                                    </div>
                                                    <div class="col-md-6  col-sm-12">
                                                        <label>@lang('admin.title_en'):</label>
                                                        <input name="title_en" value="{{$course->title_en}}" type="text"
                                                               class="form-control" required="">
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
                                                        <select id="heard" required="" name="category_id" class="form-control"
                                                        >
                                                            <option value="">-- @lang('admin.SelectCategory') --</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}"
                                                                >{{ $category['title_'.app()->getLocale()] }}</option>
                                                                @foreach($category->subCategories as $subCategory)
                                                                    <option value="{{ $subCategory->id }}"
                                                                            @if($course->category_id == $subCategory->id) selected="selected" @endif
                                                                    >
                                                                        -- {{$subCategory['title_'.app()->getLocale()]}}
                                                                    </option>
                                                                @endforeach
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6  col-sm-12">
                                                        <div class="form-group"><label>@lang('admin.isPaid')</label>
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <select id="heard" required="" class="form-control"
                                                                            name="is_paid">
                                                                        <option value="">
                                                                            -- @lang('admin.selectPaid')--
                                                                        </option>
                                                                        <option value="0"
                                                                                @if($course->is_paid == 0) selected="selected" @endif>@lang('admin.free')</option>
                                                                        <option value="1"
                                                                                @if($course->is_paid == 1) selected="selected" @endif>@lang('admin.paid')</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4">

                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">$</span>
                                                                        <input type="number" name="price" value="{{$course->price}}"
                                                                               min="0"
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
                                                        <select id="tag"
                                                                class="js-example-basic-multiple form-control w-100"
                                                                name="tags[]" multiple="multiple">
                                                            @foreach($tags as $tag)
                                                                <option value="{{$tag->id}}"
                                                                        @if(in_array($tag->id, $tags_course)) selected="selected" @endif>{{$tag['name_'.app()->getLocale()]}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <div class="row">
                                                    <div class="col-md-12  col-sm-12">
                                                        <label>@lang('admin.status'): @if($course->status == "blocked")<span
                                                                class="text-danger">@lang('course.blocked')</span> @endif
                                                        </label>
                                                        <select id="heard" required=""  @if($course->status != "blocked")name="status" @else disabled
                                                                @endif class="form-control">
                                                            <option value="">Choose..</option>
                                                            <option value="published"
                                                                    @if($course->status == "published") selected="selected" @endif> @lang('admin.published') </option>
                                                            <option value="completed"
                                                                    @if($course->status =="un-publish") selected="selected" @endif> @lang('admin.un-publish') </option>
{{--                                                            @if($course->status != "blocked" && $course->status != "in-progress")--}}

{{--                                                                --}}{{--@if($course->status != "published")--}}
{{--                                                                <option value="published"--}}
{{--                                                                        @if($course->status == "published") selected="selected" @endif>@lang('admin.published') </option>--}}
{{--                                                                --}}{{--@else--}}
{{--                                                                <option value="un-publish"--}}
{{--                                                                        @if($course->status =="un-publish") selected="selected" @endif> @lang('admin.un-publish') </option>--}}
{{--                                                                --}}{{--@endif--}}
{{--                                                            @endif--}}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="nav-description_edit" role="tabpanel" aria-labelledby="nav-description_edit-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>@lang('admin.description_ar'):</label>
                                                        <textarea rows="4" name="description_ar" id="example_ar" >
{!! $course->description_ar !!}

                                                        </textarea>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>@lang('admin.description_en'):</label>
                                                        <textarea  name="description_en" id="example_en">
{!! $course->description_en !!}
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
                                                class="btn btn-primary">@lang('admin.save')</button>
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
<script>
    new FroalaEditor('#example_en');
    new FroalaEditor('#example_ar');

{{--new FroalaEditor('#example_en', {toolbarInline:false}, function () {--}}
{{--        // Call the method inside the initialized event.--}}
{{--        editor.html.insert('{!! $course->description_en !!}');--}}

{{--    });--}}
{{--new FroalaEditor('#example_ar', {toolbarInline:false}, function () {--}}
{{--        // Call the method inside the initialized event.--}}
{{--        editor.html.insert('{!! $course->description_ar !!}');--}}
{{--    })--}}
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
<script src="jquery.js"></script>
<script src="parsley.min.js"></script>
