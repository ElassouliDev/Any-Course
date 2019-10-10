<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div
            id="m_ver_menu"
            class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
            data-menu-vertical="true"
            data-menu-scrollable="false" data-menu-dropdown-timeout="500"
    >
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
                <a href="{{url('/')}}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												@lang('course.home')
											</span>
											<span class="m-menu__link-badge">
{{--												<span class="m-badge m-badge--danger">--}}
                                                {{--													2--}}
                                                {{--												</span>--}}
											</span>
										</span>
									</span>
                </a>
            </li>
            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    Components
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            <li class="m-menu__item">
                <a href="{{route('student.courses.enrolled')}}" class="m-menu__link">
                    <i class="m-menu__link-icon fa fa-toggle-on"></i>
                    <span class="m-menu__link-text">
										@lang('course.course_enrolled')
									</span>
                </a>
            </li>
            @role('lecture|super_admin')

                <li class="m-menu__item">
                    <a href="{{route('course_lecture.index')}}" class="m-menu__link">
                        <i class="m-menu__link-icon fa fa-file-video-o"></i>
                        <span class="m-menu__link-text">
										@lang('course.course_management')
									</span>
                    </a>
                </li>
                <li class="m-menu__item">
                    <a href="{{route('course.all.student')}}" class="m-menu__link">
                        <i class="m-menu__link-icon fa fa-users"></i>
                        <span class="m-menu__link-text">
									@lang('course.all_students_in_courses')
									</span>
                    </a>
                </li>
            @endrole
            @role('lecture|super_admin')

                <li class="m-menu__item">
                    <a href="{{route('promocode.index')}}" class="m-menu__link">
                        <i class="m-menu__link-icon fa fa-file-video-o"></i>
                        <span class="m-menu__link-text">
										@lang('admin.promocode')
									</span>
                    </a>
                </li>

            @endrole

{{--            <li class="m-menu__item">--}}
{{--                <a href="create_course.html" class="m-menu__link">--}}
{{--                    <i class="m-menu__link-icon flaticon-add"></i>--}}
{{--                    <span class="m-menu__link-text">--}}
{{--										Create Course--}}
{{--									</span>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="m-menu__item">
                <a href="{{route('index')}}" class="m-menu__link">
                    <i class="m-menu__link-icon fa fa-certificate"></i>
                    <span class="m-menu__link-text">
										@lang('course.certificate')
									</span>
                </a>
            </li>
            <li class="m-menu__item">
                <a href="{{route('user.setting')}}" class="m-menu__link">
                    <i class="m-menu__link-icon flaticon-settings"></i>
                    <span class="m-menu__link-text">
										@lang('course.setting')
									</span>
                </a>
            </li>

            <li class="m-menu__item">
                <a href="{{ route('logout') }}" class="m-menu__link" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    <i class="m-menu__link-icon flaticon-logout"></i>
                    <span class="m-menu__link-text">
									@lang('auth.logout')
									</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
