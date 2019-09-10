@extends('layouts.layout')
@section('title', __('admin.setting'))
@section('content')
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            @lang('admin.Settings')
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3">
                    <div class="m-portlet__body">
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#m_tabs_3_1">
                                    @lang('admin.Personal Information')

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#m_tabs_3_2">
                                    @lang('admin.Password')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#m_tabs_3_3">
                                    @lang('admin.Notifications')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#m_tabs_3_4">
                                    @lang('admin.Courses')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#m_tabs_3_5">
                                    @lang('admin.Billing')
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_tabs_3_1" role="tabpanel">
                            <form method="post" action="{{route('student.updateInfo')}}"
                                  class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="m-portlet__body">
                                    <h3>Basic Information</h3>
                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-6">
                                            <label for="first_name">
                                                @lang('admin.first_name'):
                                            </label>
                                            <input type="text" id="first_name" name="first_name"
                                                   data_temp="{{auth()->user()->first_name}}"
                                                   value="{{auth()->user()->first_name}}"
                                                   class="form-control m-input" placeholder="Enter first name">

                                        </div>
                                        <div class="col-lg-6">
                                            <label for="last_name">
                                                @lang('admin.last_name'):
                                            </label>
                                            <input type="text" name="last_name" id="last_name"
                                                   data_temp="{{auth()->user()->last_name}}"
                                                   value="{{auth()->user()->last_name}}"
                                                   class="form-control m-input" placeholder="Enter last name">

                                        </div>
                                        <div class="col-lg-12">
                                            <label for="email">
                                                @lang('admin.email'):
                                            </label>
                                            <input type="email" name="email" id="email"
                                                   data_temp="{{auth()->user()->email}}"
                                                   value="{{auth()->user()->email}}"
                                                   class="form-control m-input" placeholder="Enter Email Address">
                                        </div>
                                        <div class="col-lg-l2  px-3 w-100">
                                            <input type="file"
                                                   onchange="this.form.filename.value = this.files.length ? this.files[0].name : ''"
                                                   class="custom-file-input bg-secondary hide"
                                                   name="image" id="image">
                                            <input type="text" name="filename"
                                                   class="form-control border-primary w-75 float-left"
                                                   placeholder="No file selected" readonly>
                                            <label id="customFile"
                                                   class="custom-file-label float-left btn btn-outline-primary w-25"
                                                   for="customFile">Choose file</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                    <div class="m-form__actions m-form__actions--solid">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <button type="submit" disabled class="btn btn-primary">
                                                    Save
                                                </button>
                                                <button type="reset" disabled class="btn btn-secondary">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="m_tabs_3_2" role="tabpanel">
                            <form class="m-form m-form--fit m-form--label-align-right">
                                <div class="m-portlet__body">
                                    <h3>Change Password</h3>
                                    <div class="form-group m-form__group">
                                        <label for="cpassword">
                                            Current Password:
                                        </label>
                                        <input type="password" id="cpassword" class="form-control m-input"
                                               placeholder="Enter current password">
                                        <span class="m-form__help">
															Please enter your current password
														</span>
                                    </div>
                                    <div class="form-group m-form__group">
                                        <label for="npassword">
                                            New Password:
                                        </label>
                                        <input type="password" id="npassword" class="form-control m-input"
                                               placeholder="Enter new password">
                                        <span class="m-form__help">
															Please enter your new password
														</span>
                                    </div>
                                    <div class="form-group m-form__group">
                                        <label for="vpassword">
                                            Verify Password:
                                        </label>
                                        <input type="password" id="vpassword" class="form-control m-input"
                                               placeholder="Enter verfiy password">
                                        <span class="m-form__help">
															Please enter your verify password
														</span>
                                    </div>
                                </div>
                                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                    <div class="m-form__actions m-form__actions--solid">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <button type="submit" disabled class="btn btn-primary">
                                                    Save
                                                </button>
                                                <button type="reset" disabled class="btn btn-secondary">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="m_tabs_3_3" role="tabpanel">
                            <div class="m-portlet__body">
                                <h3>Notifications</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex pariatur illo nisi ea,
                                    quo quia ut quis magnam ad qui?</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="m_tabs_3_4" role="tabpanel">
                            <div class="m-portlet__body">
                                <h3>My Courses</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-course">
                                            <img class="card-img-top" height="240"
                                                 src="img/courses/1555505500524_JavaScriptGrow.png" alt="Card image"
                                                 style="width:100%">
                                            <div class="card-body">
                                                <h4 class="card-title"><b>Javascript</b></h4>
                                                <p class="card-text description">Lorem ipsum dolor sit amet.</p>
                                                <a href="#" class="btn btn-primary">View Course</a>
                                                <span class="pull-right percantage"><b><i>40%</i></b></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card card-course">
                                            <img class="card-img-top" height="240"
                                                 src="img/courses/1555506865369_js.jpg" alt="Card image"
                                                 style="width:100%">
                                            <div class="card-body">
                                                <h4 class="card-title"><b>Javascript</b></h4>
                                                <p class="card-text description">Lorem ipsum dolor sit amet.</p>
                                                <a href="#" class="btn btn-primary">View Course</a>
                                                <span class="pull-right percantage"><b><i>10%</i></b></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card card-course">
                                            <img class="card-img-top" height="240"
                                                 src="img/courses/1555507315862_JavaScriptGrow.png" alt="Card image"
                                                 style="width:100%">
                                            <div class="card-body">
                                                <h4 class="card-title"><b>Javascript</b></h4>
                                                <p class="card-text description">Lorem ipsum dolor sit amet.</p>
                                                <a href="#" class="btn btn-primary">View Course</a>
                                                <span class="pull-right percantage"><b><i>30.44%</i></b></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card card-course">
                                            <img class="card-img-top" height="240"
                                                 src="img/courses/1555506865369_js.jpg" alt="Card image"
                                                 style="width:100%">
                                            <div class="card-body">
                                                <h4 class="card-title"><b>Javascript</b></h4>
                                                <p class="card-text description">Lorem ipsum dolor sit amet.</p>
                                                <a href="#" class="btn btn-primary">View Course</a>
                                                <span class="pull-right percantage"><b><i>23%</i></b></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card card-course">
                                            <img class="card-img-top" height="240"
                                                 src="img/courses/1555505500524_JavaScriptGrow.png" alt="Card image"
                                                 style="width:100%">
                                            <div class="card-body">
                                                <h4 class="card-title"><b>Javascript</b></h4>
                                                <p class="card-text description">Lorem ipsum dolor sit amet.</p>
                                                <a href="#" class="btn btn-primary">View Course</a>
                                                <span class="pull-right percantage"><b><i>40%</i></b></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card card-course">
                                            <img class="card-img-top" height="240"
                                                 src="img/courses/1555507315862_JavaScriptGrow.png" alt="Card image"
                                                 style="width:100%">
                                            <div class="card-body">
                                                <h4 class="card-title"><b>Javascript</b></h4>
                                                <p class="card-text description">Lorem ipsum dolor sit amet.</p>
                                                <a href="#" class="btn btn-primary">View Course</a>
                                                <span class="pull-right percantage"><b><i>90%</i></b></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card card-course">
                                            <img class="card-img-top" height="240"
                                                 src="img/courses/1555505500524_JavaScriptGrow.png" alt="Card image"
                                                 style="width:100%">
                                            <div class="card-body">
                                                <h4 class="card-title"><b>Javascript</b></h4>
                                                <p class="card-text description">Lorem ipsum dolor sit amet.</p>
                                                <a href="#" class="btn btn-primary">View Course</a>
                                                <span class="pull-right percantage"><b><i>40%</i></b></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="m_tabs_3_5" role="tabpanel">
                            <div class="m-portlet__body">
                                <h3>Billings</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex pariatur illo nisi ea,
                                    quo quia ut quis magnam ad qui?</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">

        //////////////////  function to track any change in form
        $('input').change(function () {
            parent = $(this).parents('form');
            var status = false;
            parent.find('[data_temp]').each(function (index, value) {
                status = ($(this).val() != $(this).attr('data_temp')) ? true : status;
            });
            parent.find('[type="file"]').each(function () {
                status = $(this).val() == '' ? status : true;
            });
            if (status) {
                parent.find('button').attr('disabled', false)
            } else {
                parent.find('button').attr('disabled', true)
            }
        });/////////////////  end form


        //////////////////  custom file
        $(document).on('click', '#customFile', function () {
            $('#image').click();
        });//////////// end funvtion

        /////////////////////////////////////  start function reset form
        $(document).on('click', '[type="reset"]', function () {
            parent = $(this).parents('form');
            parent.find('[data_temp]').each(function (index, value) {
                $(this).val($(this).attr('data_temp'));
            });
            parent.find('button').attr('disabled', true);

        });///end function reset form

        /////////////////////////////////////  start function send data form

        $(document).on('submit', '.tab-pane.active form', function (event) {
            event.preventDefault();
            var $this = $(this);
            notifications.loading.show();
            $this.find('button').attr('disabled', false);
            var url = $($this).attr('action');
            data = new FormData(this);
            request = $.ajax({
                url: url,
                method: "post",
                data: data,
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false
            });
            request.done(function (response) {

                http.success(response, true);
                $this.find('[data_temp]').each(function (index, value) {
                    $(this).attr('data_temp', $(this).val());
                });
                $this.find('[type="reset"]').click();


            });
            request.fail(function (response, exception) {
                $this.find('button').attr('disabled', true);
                http.fail(JSON.parse(response.responseText), true);
            });
            return false;
        });

        ///////////// end function send data
    </script>
@endpush
