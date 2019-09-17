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
                    <form role="form" method="post" action="{{route('course_lecture.update')}}" autocomplete="off"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="course_id" value="{{$course->id}}">
                        <div class="form-group-attached">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label>@lang('admin.title_ar'):</label>
                                                <input name="title_ar" type="text" value="{{$course->title_ar}}"
                                                       class="form-control" >
                                            </div>
                                            <div class="col-md-6  col-sm-12">
                                                <label>@lang('admin.title_en'):</label>
                                                <input name="title_en" value="{{$course->title_en}}" type="text"
                                                       class="form-control" >
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
                                                <select name="category_id" class="form-control"
                                                        >
                                                    <option value="-1">-- @lang('admin.SelectCategory') --</option>
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
                                                            <select class="form-control" 
                                                                    name="is_paid">
                                                                <option value="-1">
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
                                                                <input type="number" value="{{$course->price}}" 
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
                                            <div class="col-md-6 col-sm-12">
                                                <label>@lang('admin.description_ar'):</label>
                                                <textarea rows="4" name="description_ar"
                                                          style="resize: none"
                                                          class="form-control"
                                                          >{{$course->description_ar}}</textarea>
                                            </div>
                                            <div class="col-md-6  col-sm-12">
                                                <label>@lang('admin.description_en'):</label>
                                                <textarea rows="4" name="description_en"
                                                          style="resize: none"
                                                          class="form-control"
                                                          >{{$course->description_en}}</textarea>
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
                                                <label>@lang('admin.status'):</label>
                                                <select name="status" class="form-control" >
                                                    <option value="published" @if($course->status == "published") selected="selected" @endif>@lang('admin.published') </option>
                                                    <option value="In-publish" @if($course->status =="In-publish") selected="selected" @endif> @lang('admin.In-publish') </option>
                                                    <option value="in-progress" @if($course->status == "in-progress") selected="selected" @endif> @lang('admin.in-progress') </option>
                                                    <option value="blocked" @if($course->status == "blocked") selected="selected" @endif> @lang('admin.blocked') </option>
                                                    <option value="closed" @if($course->status =="closed") selected="selected" @endif> @lang('admin.closed') </option>
                                                </select>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>