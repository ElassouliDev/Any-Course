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
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-layers"></i>
                    <span class="m-menu__link-text">
										Base
									</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <a href="#" class="m-menu__link ">
												<span class="m-menu__link-text">
													Base
												</span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="components/base/state.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
													State Colors
												</span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="components/base/typography.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
													Typography
												</span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="components/base/stack.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
													Stack
												</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item">
                <a href="{{route('student.courses.enrolled')}}" class="m-menu__link">
                    <i class="m-menu__link-icon flaticon-settings"></i>
                    <span class="m-menu__link-text">
										@lang('course.course_enrolled')
									</span>
                </a>
            </li>
            <li class="m-menu__item">
                <a href="{{route('course_lecture.index')}}" class="m-menu__link">
                    <i class="m-menu__link-icon flaticon-settings"></i>
                    <span class="m-menu__link-text">
										@lang('course.course_management')
									</span>
                </a>
            </li>
            <li class="m-menu__item">
                <a href="create_course.html" class="m-menu__link">
                    <i class="m-menu__link-icon flaticon-add"></i>
                    <span class="m-menu__link-text">
										Create Course
									</span>
                </a>
            </li>

            <li class="m-menu__item">
                <a href="{{route('student.setting')}}" class="m-menu__link">
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
