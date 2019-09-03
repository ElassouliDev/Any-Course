<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>
    <title>
        AnyCourse | Home
    </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Web font -->
    <script src="{{asset('course_assets/js/webfontloader.js')}}"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome-rtl.min.css') }}">

    <!--end::Web font -->
    <!--begin::Base Styles -->
    <link href="{{asset('course_assets/vendors/vendors.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('course_assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('course_assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Base Styles -->
    <link rel="shortcut icon" href="{{url('course_assets/img/logo/logo.png')}}"/>
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <!-- BEGIN: Header -->
    <header class="m-grid__item    m-header " data-minimize-offset="200" data-minimize-mobile-offset="200">
        <div class="m-container m-container--fluid m-container--full-height">
            <div class="m-stack m-stack--ver m-stack--desktop">
                <!-- BEGIN: Brand -->
                @if(auth()->user())

                <div class="m-stack__item m-brand  m-brand--skin-dark ">
                    <div class="m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-stack__item--middle m-brand__logo">
                            <a href="{{url('/')}}" class="m-brand__logo-wrapper">
                                <img alt="" src="{{url('course_assets/img/logo/logo.png')}}" width="50" height="40"/>
                                <span>Any Course</span>
                            </a>
                        </div>
                            <div class="m-stack__item m-stack__item--middle m-brand__tools">
                                <!-- BEGIN: Left Aside Minimize Toggle -->
                                <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block
					 ">
                                    <span></span>
                                </a>
                                <!-- END -->
                                <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                                <a href="javascript:;" id="m_aside_left_offcanvas_toggle"
                                   class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                    <span></span>
                                </a>
                                <!-- END -->
                                <!-- BEGIN: Responsive Header Menu Toggler -->
                                <a id="m_aside_header_menu_mobile_toggle" href="javascript:;"
                                   class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                    <span></span>
                                </a>
                                <!-- END -->
                                <!-- BEGIN: Topbar Toggler -->
                                <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;"
                                   class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                    <i class="flaticon-more"></i>
                                </a>
                                <!-- BEGIN: Topbar Toggler -->
                            </div>

                    </div>
                </div>
                @else
                    <div class="m-stack__item m-brand  m-brand--skin-light">
                        <div class="m-stack m-stack--ver m-stack--general">
                            <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                <a href="{{url('/')}}" class="m-brand__logo-wrapper">
                                    <img alt="" src="{{url('course_assets/img/logo/logo.png')}}" width="50" height="40"/>
                                    <span class="text-dark">Any Course</span>
                                </a>
                            </div>

                        </div>
                    </div>
            @endif

            <!-- END: Brand -->
                <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                    <!-- BEGIN: Horizontal Menu -->
                    <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark "
                            id="m_aside_header_menu_mobile_close_btn">
                        <i class="la la-close"></i>
                    </button>
                    <div id="m_header_menu"
                         class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">
                        <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                            <li class="m-menu__item">Home</li>
                            <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"
                                data-menu-submenu-toggle="click" data-redirect="true" aria-haspopup="true">
                                <a href="#" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-add"></i>
                                    <span class="m-menu__link-text">
												Actions
											</span>
                                    <i class="m-menu__hor-arrow la la-angle-down"></i>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                    <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item " aria-haspopup="true">
                                            <a href="header/actions.html" class="m-menu__link ">
                                                <i class="m-menu__link-icon flaticon-file"></i>
                                                <span class="m-menu__link-text">
															Create New Post
														</span>
                                            </a>
                                        </li>
                                        <li class="m-menu__item " data-redirect="true" aria-haspopup="true">
                                            <a href="header/actions.html" class="m-menu__link ">
                                                <i class="m-menu__link-icon flaticon-diagram"></i>
                                                <span class="m-menu__link-title">
															<span class="m-menu__link-wrap">
																<span class="m-menu__link-text">
																	Generate Reports
																</span>
																<span class="m-menu__link-badge">
																	<span class="m-badge m-badge--success">
																		2
																	</span>
																</span>
															</span>
														</span>
                                            </a>
                                        </li>
                                        <li class="m-menu__item  m-menu__item--submenu" data-menu-submenu-toggle="hover"
                                            data-redirect="true" aria-haspopup="true">
                                            <a href="#" class="m-menu__link m-menu__toggle">
                                                <i class="m-menu__link-icon flaticon-business"></i>
                                                <span class="m-menu__link-text">
															Manage Orders
														</span>
                                                <i class="m-menu__hor-arrow la la-angle-right"></i>
                                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                                            </a>
                                            <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                                                <span class="m-menu__arrow "></span>
                                                <ul class="m-menu__subnav">
                                                    <li class="m-menu__item " data-redirect="true" aria-haspopup="true">
                                                        <a href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Latest Orders
																	</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-menu__item " data-redirect="true" aria-haspopup="true">
                                                        <a href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Pending Orders
																	</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-menu__item " data-redirect="true" aria-haspopup="true">
                                                        <a href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Processed Orders
																	</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-menu__item " data-redirect="true" aria-haspopup="true">
                                                        <a href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Delivery Reports
																	</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-menu__item " data-redirect="true" aria-haspopup="true">
                                                        <a href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Payments
																	</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-menu__item " data-redirect="true" aria-haspopup="true">
                                                        <a href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Customers
																	</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="m-menu__item  m-menu__item--submenu" data-menu-submenu-toggle="hover"
                                            data-redirect="true" aria-haspopup="true">
                                            <a href="#" class="m-menu__link m-menu__toggle">
                                                <i class="m-menu__link-icon flaticon-chat-1"></i>
                                                <span class="m-menu__link-text">
															Customer Feedbacks
														</span>
                                                <i class="m-menu__hor-arrow la la-angle-right"></i>
                                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                                            </a>
                                            <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                                                <span class="m-menu__arrow "></span>
                                                <ul class="m-menu__subnav">
                                                    <li class="m-menu__item " data-redirect="true" aria-haspopup="true">
                                                        <a href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Customer Feedbacks
																	</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-menu__item " data-redirect="true" aria-haspopup="true">
                                                        <a href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Supplier Feedbacks
																	</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-menu__item " data-redirect="true" aria-haspopup="true">
                                                        <a href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Reviewed Feedbacks
																	</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-menu__item " data-redirect="true" aria-haspopup="true">
                                                        <a href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Resolved Feedbacks
																	</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-menu__item " data-redirect="true" aria-haspopup="true">
                                                        <a href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Feedback Reports
																	</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="m-menu__item " data-redirect="true" aria-haspopup="true">
                                            <a href="header/actions.html" class="m-menu__link ">
                                                <i class="m-menu__link-icon flaticon-users"></i>
                                                <span class="m-menu__link-text">
															Register Member
														</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- END: Horizontal Menu -->                                <!-- BEGIN: Topbar -->

                    <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-topbar__nav-wrapper">
                            <ul class="m-topbar__nav m-nav m-nav--inline">
                                <li class="m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light	m-list-search m-list-search--skin-light"
                                    data-dropdown-toggle="click" data-dropdown-persistent="true" id="m_quicksearch"
                                    data-search-type="dropdown">
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-icon">
													<i class="flaticon-search-1"></i>
												</span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                        <div class="m-dropdown__inner ">
                                            <div class="m-dropdown__header">
                                                <form class="m-list-search__form">
                                                    <div class="m-list-search__form-wrapper">
																<span class="m-list-search__form-input-wrapper">
																	<input id="m_quicksearch_input" autocomplete="off"
                                                                           type="text" name="q"
                                                                           class="m-list-search__form-input" value=""
                                                                           placeholder="Search...">
																</span>
                                                        <span class="m-list-search__form-icon-close"
                                                              id="m_quicksearch_close">
																	<i class="la la-remove"></i>
																</span>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__scrollable m-scrollable" data-scrollable="true"
                                                     data-max-height="300" data-mobile-max-height="200">
                                                    <div class="m-dropdown__content"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                              @if(auth()->user())
                                <li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width"
                                    data-dropdown-toggle="click" data-dropdown-persistent="true">
                                    <a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
                                        <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger"></span>
                                        <span class="m-nav__link-icon">
													<i class="flaticon-music-2"></i>
												</span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center"
                                                 style="background: url(assets/app/media/img/misc/notification_bg.jpg); background-size: cover;">
														<span class="m-dropdown__header-title">
															9 New
														</span>
                                                <span class="m-dropdown__header-subtitle">
															User Notifications
														</span>
                                            </div>
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand"
                                                        role="tablist">
                                                        <li class="nav-item m-tabs__item">
                                                            <a class="nav-link m-tabs__link active" data-toggle="tab"
                                                               href="#topbar_notifications_notifications" role="tab">
                                                                Alerts
                                                            </a>
                                                        </li>
                                                        <li class="nav-item m-tabs__item">
                                                            <a class="nav-link m-tabs__link" data-toggle="tab"
                                                               href="#topbar_notifications_events" role="tab">
                                                                Events
                                                            </a>
                                                        </li>
                                                        <li class="nav-item m-tabs__item">
                                                            <a class="nav-link m-tabs__link" data-toggle="tab"
                                                               href="#topbar_notifications_logs" role="tab">
                                                                Logs
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active"
                                                             id="topbar_notifications_notifications" role="tabpanel">
                                                            <div class="m-scrollable" data-scrollable="true"
                                                                 data-max-height="250" data-mobile-max-height="200">
                                                                <div class="m-list-timeline m-list-timeline--skin-light">
                                                                    <div class="m-list-timeline__items">
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
                                                                            <span class="m-list-timeline__text">
																						12 new users registered
																					</span>
                                                                            <span class="m-list-timeline__time">
																						Just now
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge"></span>
                                                                            <span class="m-list-timeline__text">
																						System shutdown
																						<span class="m-badge m-badge--success m-badge--wide">
																							pending
																						</span>
																					</span>
                                                                            <span class="m-list-timeline__time">
																						14 mins
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge"></span>
                                                                            <span class="m-list-timeline__text">
																						New invoice received
																					</span>
                                                                            <span class="m-list-timeline__time">
																						20 mins
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge"></span>
                                                                            <span class="m-list-timeline__text">
																						DB overloaded 80%
																						<span class="m-badge m-badge--info m-badge--wide">
																							settled
																						</span>
																					</span>
                                                                            <span class="m-list-timeline__time">
																						1 hr
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge"></span>
                                                                            <span class="m-list-timeline__text">
																						System error -
																						<a href="#" class="m-link">
																							Check
																						</a>
																					</span>
                                                                            <span class="m-list-timeline__time">
																						2 hrs
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item m-list-timeline__item--read">
                                                                            <span class="m-list-timeline__badge"></span>
                                                                            <span href="" class="m-list-timeline__text">
																						New order received
																						<span class="m-badge m-badge--danger m-badge--wide">
																							urgent
																						</span>
																					</span>
                                                                            <span class="m-list-timeline__time">
																						7 hrs
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item m-list-timeline__item--read">
                                                                            <span class="m-list-timeline__badge"></span>
                                                                            <span class="m-list-timeline__text">
																						Production server down
																					</span>
                                                                            <span class="m-list-timeline__time">
																						3 hrs
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge"></span>
                                                                            <span class="m-list-timeline__text">
																						Production server up
																					</span>
                                                                            <span class="m-list-timeline__time">
																						5 hrs
																					</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="topbar_notifications_events"
                                                             role="tabpanel">
                                                            <div class="m-scrollable" m-scrollabledata-scrollable="true"
                                                                 data-max-height="250" data-mobile-max-height="200">
                                                                <div class="m-list-timeline m-list-timeline--skin-light">
                                                                    <div class="m-list-timeline__items">
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                                                            <a href="" class="m-list-timeline__text">
                                                                                New order received
                                                                            </a>
                                                                            <span class="m-list-timeline__time">
																						Just now
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge m-list-timeline__badge--state1-danger"></span>
                                                                            <a href="" class="m-list-timeline__text">
                                                                                New invoice received
                                                                            </a>
                                                                            <span class="m-list-timeline__time">
																						20 mins
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                                                            <a href="" class="m-list-timeline__text">
                                                                                Production server up
                                                                            </a>
                                                                            <span class="m-list-timeline__time">
																						5 hrs
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                                            <a href="" class="m-list-timeline__text">
                                                                                New order received
                                                                            </a>
                                                                            <span class="m-list-timeline__time">
																						7 hrs
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                                            <a href="" class="m-list-timeline__text">
                                                                                System shutdown
                                                                            </a>
                                                                            <span class="m-list-timeline__time">
																						11 mins
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                                            <a href="" class="m-list-timeline__text">
                                                                                Production server down
                                                                            </a>
                                                                            <span class="m-list-timeline__time">
																						3 hrs
																					</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="topbar_notifications_logs"
                                                             role="tabpanel">
                                                            <div class="m-stack m-stack--ver m-stack--general"
                                                                 style="min-height: 180px;">
                                                                <div class="m-stack__item m-stack__item--center m-stack__item--middle">
																			<span class="">
																				All caught up!
																				<br>
																				No new logs.
																			</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="m-nav__item m-topbar__quick-actions m-topbar__quick-actions--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light"
                                    data-dropdown-toggle="click">
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
                                        <span class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
                                        <span class="m-nav__link-icon">
													<i class="flaticon-share"></i>
												</span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center"
                                                 style="background: url(assets/app/media/img/misc/quick_actions_bg.jpg); background-size: cover;">
														<span class="m-dropdown__header-title">
															Quick Actions
														</span>
                                                <span class="m-dropdown__header-subtitle">
															Shortcuts
														</span>
                                            </div>
                                            <div class="m-dropdown__body m-dropdown__body--paddingless">
                                                <div class="m-dropdown__content">
                                                    <div class="m-scrollable" data-scrollable="false"
                                                         data-max-height="380" data-mobile-max-height="200">
                                                        <div class="m-nav-grid m-nav-grid--skin-light">
                                                            <div class="m-nav-grid__row">
                                                                <a href="#" class="m-nav-grid__item">
                                                                    <i class="m-nav-grid__icon flaticon-file"></i>
                                                                    <span class="m-nav-grid__text">
																				Generate Report
																			</span>
                                                                </a>
                                                                <a href="#" class="m-nav-grid__item">
                                                                    <i class="m-nav-grid__icon flaticon-time"></i>
                                                                    <span class="m-nav-grid__text">
																				Add New Event
																			</span>
                                                                </a>
                                                            </div>
                                                            <div class="m-nav-grid__row">
                                                                <a href="#" class="m-nav-grid__item">
                                                                    <i class="m-nav-grid__icon flaticon-folder"></i>
                                                                    <span class="m-nav-grid__text">
																				Create New Task
																			</span>
                                                                </a>
                                                                <a href="#" class="m-nav-grid__item">
                                                                    <i class="m-nav-grid__icon flaticon-clipboard"></i>
                                                                    <span class="m-nav-grid__text">
																				Completed Tasks
																			</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                    data-dropdown-toggle="click">
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="{{url('course_assets/img/users/user4.jpg')}}"
                                                         class="m--img-rounded m--marginless m--img-centered" alt=""/>
												</span>
                                        <span class="m-topbar__username m--hide">
													Nick
												</span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center"
                                                 style="background: url(assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
                                                <div class="m-card-user m-card-user--skin-dark">
                                                    <div class="m-card-user__pic">
                                                        <img src="{{url('course_assets/img/users/user4.jpg')}}"
                                                             class="m--img-rounded m--marginless" alt=""/>
                                                    </div>
                                                    <div class="m-card-user__details">
																<span class="m-card-user__name m--font-weight-500">
																	Mark Andre
																</span>
                                                        <a href="" class="m-card-user__email m--font-weight-300 m-link">
                                                            mark.andre@gmail.com
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <ul class="m-nav m-nav--skin-light">
                                                        <li class="m-nav__section m--hide">
																	<span class="m-nav__section-text">
																		Section
																	</span>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="header/profile.html" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                                <span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">
																					My Profile
																				</span>
																				<span class="m-nav__link-badge">
																					<span class="m-badge m-badge--success">
																						2
																					</span>
																				</span>
																			</span>
																		</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="header/profile.html" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-share"></i>
                                                                <span class="m-nav__link-text">
																			Activity
																		</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="header/profile.html" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                <span class="m-nav__link-text">
																			Messages
																		</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__separator m-nav__separator--fit"></li>
                                                        <li class="m-nav__item">
                                                            <a href="header/profile.html" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-info"></i>
                                                                <span class="m-nav__link-text">
																			FAQ
																		</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="header/profile.html" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                <span class="m-nav__link-text">
																			Support
																		</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__separator m-nav__separator--fit"></li>
                                                        <li class="m-nav__item">
                                                            <a href="snippets/pages/user/login-1.html"
                                                               class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                                Logout
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @else
                                    <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                        data-dropdown-toggle="click">
                                        <a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<i class="fa fa-bars"></i>
												</span>

                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                              <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav m-nav--skin-light">

                                                                <li class="m-nav__item">
                                                                    <a href="{{url('login')}}"
                                                                       class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                                        @lang('admin.login')
                                                                    </a>
                                                                </li><li class="m-nav__item">
                                                                    <a href="{{url('register')}}"
                                                                       class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                                        @lang('admin.register')
                                                                    </a>
                                                                </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                @endif
                            </ul>
                        </div>
                    </div>
                    <!-- END: Topbar -->
                </div>
            </div>
        </div>
    </header>
    <!-- END: Header -->
    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        <!-- BEGIN: Left Aside -->
        <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
            <i class="la la-close"></i>
        </button>
    @if(auth()->user())
        @include('layouts.aside')
    @endif
    <!-- END: Left Aside -->
        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    {{--  <div class="mr-auto">
                          <h3 class="m-subheader__title ">
                              Courses
                          </h3>
                      </div>--}}

                </div>
            </div>
            <!-- END: Subheader -->
            @if(!auth()->user())
                <div class="container">
                    @endif
                    @yield('content')

                    @if(!auth()->user())
                </div>
            @endif
            {{-- <div class="m-content">
                 <div class="m-portlet">
                     <div class="m-portlet__head">
                         <div class="m-portlet__head-caption">
                             <div class="m-portlet__head-title">
                                 <h3 class="m-portlet__head-text">
                                     Latest Courses
                                 </h3>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-4">
                             <div class="card card-course">
                                 <img class="card-img-top" height="240" src="{{url('course_assets/img/courses/1555505500524_JavaScriptGrow.png')}}" alt="Card image" style="width:100%">
                                 <div class="card-body">
                                     <h4 class="card-title"><b>Javascript</b></h4>
                                     <p class="card-text description">Lorem ipsum dolor sit amet.</p>
                                     <a href="#" class="btn btn-primary">View Course</a>
                                     <span class="pull-right"><b><s>20.22$</s>  <i><strong>$ 11.89</strong></i></b></span>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="card card-course">
                                 <img class="card-img-top" height="240" src="{{url('course_assets/img/courses/1555506865369_js.jpg')}}" alt="Card image" style="width:100%">
                                 <div class="card-body">
                                     <h4 class="card-title"><b>Javascript</b></h4>
                                     <p class="card-text description">Lorem ipsum dolor sit amet.</p>
                                     <a href="#" class="btn btn-primary">View Course</a>
                                     <span class="pull-right"><b><s>20.22$</s>  <i><strong>$ 11.89</strong></i></b></span>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="card card-course">
                                 <img class="card-img-top" height="240" src="{{url('course_assets/img/courses/1555507315862_JavaScriptGrow.png')}}" alt="Card image" style="width:100%">
                                 <div class="card-body">
                                     <h4 class="card-title"><b>Javascript</b></h4>
                                     <p class="card-text description">Lorem ipsum dolor sit amet.</p>
                                     <a href="#" class="btn btn-primary">View Course</a>
                                     <span class="pull-right"><b><s>20.22$</s>  <i><strong>$ 11.89</strong></i></b></span>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="card card-course">
                                 <img class="card-img-top" height="240" src="{{url('course_assets/img/courses/1555506865369_js.jpg')}}" alt="Card image" style="width:100%">
                                 <div class="card-body">
                                     <h4 class="card-title"><b>Javascript</b></h4>
                                     <p class="card-text description">Lorem ipsum dolor sit amet.</p>
                                     <a href="#" class="btn btn-primary">View Course</a>
                                     <span class="pull-right"><b><s>20.22$</s>  <i><strong>$ 11.89</strong></i></b></span>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="card card-course">
                                 <img class="card-img-top" height="240" src="{{url('course_assets/img/courses/1555505500524_JavaScriptGrow.png')}}" alt="Card image" style="width:100%">
                                 <div class="card-body">
                                     <h4 class="card-title"><b>Javascript</b></h4>
                                     <p class="card-text description">Lorem ipsum dolor sit amet.</p>
                                     <a href="#" class="btn btn-primary">View Course</a>
                                     <span class="pull-right"><b><s>20.22$</s>  <i><strong>$ 11.89</strong></i></b></span>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="card card-course">
                                 <img class="card-img-top" height="240" src="{{url('course_assets/img/courses/1555506865369_js.jpg')}}" alt="Card image" style="width:100%">
                                 <div class="card-body">
                                     <h4 class="card-title"><b>Javascript</b></h4>
                                     <p class="card-text description">Lorem ipsum dolor sit amet.</p>
                                     <a href="#" class="btn btn-primary">View Course</a>
                                     <span class="pull-right"><b><s>20.22$</s>  <i><strong>$ 11.89</strong></i></b></span>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="card card-course">
                                 <img class="card-img-top" height="240" src="{{url('course_assets/img/courses/1555507315862_JavaScriptGrow.png')}}" alt="Card image" style="width:100%">
                                 <div class="card-body">
                                     <h4 class="card-title"><b>Javascript</b></h4>
                                     <p class="card-text description">Lorem ipsum dolor sit amet.</p>
                                     <a href="#" class="btn btn-primary">View Course</a>
                                     <span class="pull-right"><b><s>20.22$</s>  <i><strong>$ 11.89</strong></i></b></span>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="card card-course">
                                 <img class="card-img-top" height="240" src="{{url('course_assets/img/courses/1555506865369_js.jpg')}}" alt="Card image" style="width:100%">
                                 <div class="card-body">
                                     <h4 class="card-title"><b>Javascript</b></h4>
                                     <p class="card-text description">Lorem ipsum dolor sit amet.</p>
                                     <a href="#" class="btn btn-primary">View Course</a>
                                     <span class="pull-right"><b><s>20.22$</s>  <i><strong>$ 11.89</strong></i></b></span>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="card card-course">
                                 <img class="card-img-top" height="240" src="{{url('course_assets/img/courses/1555505500524_JavaScriptGrow.png')}}" alt="Card image" style="width:100%">
                                 <div class="card-body">
                                     <h4 class="card-title"><b>Javascript</b></h4>
                                     <p class="card-text description">Lorem ipsum dolor sit amet.</p>
                                     <a href="#" class="btn btn-primary">View Course</a>
                                     <span class="pull-right"><b><s>20.22$</s>  <i><strong>$ 11.89</strong></i></b></span>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="card card-course">
                                 <img class="card-img-top" height="240" src="{{url('course_assets/img/courses/1555506865369_js.jpg')}}" alt="Card image" style="width:100%">
                                 <div class="card-body">
                                     <h4 class="card-title"><b>Javascript</b></h4>
                                     <p class="card-text description">Lorem ipsum dolor sit amet.</p>
                                     <a href="#" class="btn btn-primary">View Course</a>
                                     <span class="pull-right"><b><s>20.22$</s>  <i><strong>$ 11.89</strong></i></b></span>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="card card-course">
                                 <img class="card-img-top" height="240" src="{{url('course_assets/img/courses/1555507315862_JavaScriptGrow.png')}}" alt="Card image" style="width:100%">
                                 <div class="card-body">
                                     <h4 class="card-title"><b>Javascript</b></h4>
                                     <p class="card-text description">Lorem ipsum dolor sit amet.</p>
                                     <a href="#" class="btn btn-primary">View Course</a>
                                     <span class="pull-right"><b><s>20.22$</s>  <i><strong>$ 11.89</strong></i></b></span>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="card card-course">
                                 <img class="card-img-top" height="240" src="{{url('course_assets/img/courses/1555506865369_js.jpg')}}" alt="Card image" style="width:100%">
                                 <div class="card-body">
                                     <h4 class="card-title"><b>Javascript</b></h4>
                                     <p class="card-text description">Lorem ipsum dolor sit amet.</p>
                                     <a href="#" class="btn btn-primary">View Course</a>
                                     <span class="pull-right"><b><s>20.22$</s>  <i><strong>$ 11.89</strong></i></b></span>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>--}}


        </div>
    </div>
    <!-- end:: Body -->
    <!-- begin::Footer -->
    <footer class="m-grid__item		m-footer ">
        <div class="m-container m-container--fluid m-container--full-height m-page__container">
            <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">
								2019 &copy; by
								<a href="#" class="m-link">
									Any Course
								</a>
							</span>
                </div>
                <div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
                    <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
                        <li class="m-nav__item">
                            <a href="#" class="m-nav__link">
										<span class="m-nav__link-text">
											About
										</span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="#" class="m-nav__link">
										<span class="m-nav__link-text">
											Privacy
										</span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="#" class="m-nav__link">
										<span class="m-nav__link-text">
											T&C
										</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- end::Footer -->
</div>
<!-- end:: Page -->
<!-- begin::Scroll Top -->
<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500"
     data-scroll-speed="300">
    <i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->            <!-- begin::Quick Nav -->
    {{--<ul class="m-nav-sticky" style="margin-top: 30px;">--}}
    <!--
    <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Showcase" data-placement="left">
        <a href="">
            <i class="la la-eye"></i>
        </a>
    </li>
    <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Pre-sale Chat" data-placement="left">
        <a href="" >
            <i class="la la-comments-o"></i>
        </a>
    </li>
    -->
    <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Purchase" data-placement="left">
        <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes"
           target="_blank">
            <i class="la la-cart-arrow-down"></i>
        </a>
    </li>
    <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Documentation" data-placement="left">
        <a href="http://keenthemes.com/metronic/documentation.html" target="_blank">
            <i class="la la-code-fork"></i>
        </a>
    </li>
    <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Support" data-placement="left">
        <a href="http://keenthemes.com/forums/forum/support/metronic5/" target="_blank">
            <i class="la la-life-ring"></i>
        </a>
    </li>
</ul>
<!-- begin::Quick Nav -->
<!--begin::Base Scripts -->
<script src="{{asset('course_assets/vendors/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('course_assets/js/scripts.bundle.js')}}" type="text/javascript"></script>
<!--end::Base Scripts -->
<!--begin::Page Snippets -->
<script src="{{asset('course_assets/js/dashboard.js')}}" type="text/javascript"></script>
<!--end::Page Snippets -->
</body>
<!-- end::Body -->
</html>
