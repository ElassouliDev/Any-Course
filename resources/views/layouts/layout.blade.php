<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>
    <title>
        {{$site_title}} | @yield('title')
    </title>

    <link href="{{asset('plugins/lib/')}}/css/emoji.css" rel="stylesheet">
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--begin::Web font -->
    <script src="{{asset('course_assets/js/webfontloader.js')}}"></script>
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>

    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
        Pusher.logToConsole = true;
        url = "{{url('notifications')}}" + '/' + "{{auth()->id()}}";

        var pusher = new Pusher('3154f7166f89b46a4e19', {
            cluster: 'ap2',
            forceTLS: true
        });

        var channel = pusher.subscribe('my-channel');
        var channel2 = pusher.subscribe('my-channel' + "{{auth()->id()}}");
        channel.bind('my-event', function (data) {
            var result = JSON.parse(JSON.stringify(data));
            // console.log(result);
            $.get(url, function (response) {
                console.table(response);
                var notifcations = $('#notifcation  .notifcation');
                notifcations.prepend("<div class='m-list-timeline__item'>" + "<span class='m-list-timeline__badge m-list-timeline__badge--state1-success'></span>" +
                    @if(app()->getLocale() == 'en')
                        "<a href='" + result.data.url_en + "'  class='m-list-timeline__text' >" + result.data.message_en + "</a>" +
                    @else
                        "<a href='" + result.data.url_ar + "'>" + result.data.message_ar + "</a>" +
                    @endif

                        "<span class='m-list-timeline__time'>" +
                    result.data.created_at
                    + "</span>" +
                    +"</div>");
            });
            $('.notifications-logo-status').attr('id','m_topbar_notification_icon')
            // $('.notifications-logo-status').find('span.m-nav__link-badge.m-badge.m-badge--dot.m-badge--dot-small.m-badge--danger').removeClass('');
            // $('.notifications-logo-status').find('span.m-nav__link-icon').removeClass('');

        });
        channel2.bind('my-event2', function (data) {
            var result = JSON.parse(JSON.stringify(data));
            console.log(result);
            url = "{{url('/')}}" + '/' + result.data.user_id+ '/notifications';
            $.get(url, function (response) {
                // console.table(response);

                $('.m-list-timeline__items.notification').prepend(
                    "<div class='m-list-timeline__item'>" +
                    "<span class='m-list-timeline__badge m-list-timeline__badge--state1-success'></span>" +
                    @if(app()->getLocale() == 'en')
                        "<a href='" + result.data.url_en  + "'  class='m-list-timeline__text' >" + result.data.message_en + "</a>" +
                    @else
                        "<a href='" + result.data.url_ar + "'>" + result.data.message_ar + "</a>" +
                    @endif

                        "<span class='m-list-timeline__time'>" +
                    result.data.created_at
                    + "</span>" +
                    +"</div>");
                // id="m_topbar_notification_icon"
                $('.notifications-logo-status').attr('id','m_topbar_notification_icon')
            });
        });
    </script>
    <link rel="shortcut icon" href="{{ url(@$icon)}}"/>

    <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome-rtl.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <!--end::Web font -->
    <!--begin::Base Styles -->
    <link href="{{asset('course_assets/vendors/vendors.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('course_assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('course_assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Base Styles -->
    <link rel="shortcut icon" href="{{ url($icon)}}"/>
    <link href="{{ asset('resources/assets/css/custom.css') }}" rel="stylesheet" type="text/css">

    @stack('css')
</head>
<!-- end::Head -->
<!-- end::Body -->
<body
    class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
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
                                    <img alt="" src="{{url($logo)}}" width="50" height="40"/>
                                    <span>{{$site_title}}</span>
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
                                    <img alt="" src="{{url('course_assets/img/logo/logo.png')}}" width="50"
                                         height="40"/>
                                    <span class="text-dark">{{$site_title}}</span>
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
                            <li class="m-menu__item">@lang('admin.home')</li>

                            <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"
                                data-menu-submenu-toggle="click" data-redirect="true" aria-haspopup="true">
                                <a href="#" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon fa fa-language"></i>
                                    <span class="m-menu__link-text">
												@lang('course.The language')
											</span>
                                    <i class="m-menu__hor-arrow la la-angle-down"></i>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                    <span class="m-menu__arrow m-menu__arrow--adjust "></span>
                                    <ul class="m-menu__subnav">
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <li class="m-menu__item " aria-haspopup="true">

                                                <a rel="alternate" hreflang="{{ $localeCode }}" class="m-menu__link "
                                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>

                                                    <span class="m-menu__link-text">
                                                     {{ $properties['native'] }}
                                                    </span>

                                                </a>
                                            </li>
                                        @endforeach
                                        <li class="m-menu__item " aria-haspopup="true">

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

                                @if(auth()->user())
                                    <li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width"
                                        data-dropdown-toggle="click" data-dropdown-persistent="true">
                                        <a href="#" class="m-nav__link m-dropdown__toggle notifications-logo-status"

                                           @if(count(auth()->user()->unreadNotifications) > 0)
                                           id="m_topbar_notification_icon"
                                           @endif
                                        >
                                            <span
                                                class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger"></span>
                                            <span class="m-nav__link-icon ">
													<i class="flaticon-music-2"></i>
												</span>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                            <div class="m-dropdown__inner">

                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand"
                                                            role="tablist">
                                                            <li class="nav-item m-tabs__item">
                                                                <a class="nav-link m-tabs__link active"
                                                                   data-toggle="tab"
                                                                   href="#topbar_notifications_notifications"
                                                                   role="tab">
                                                                    @lang('admin.notifications')
                                                                </a>
                                                            </li>

                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane active"
                                                                 id="topbar_notifications_notifications"
                                                                 role="tabpanel">
                                                                <div class="m-scrollable" data-scrollable="true"
                                                                     data-max-height="250" data-mobile-max-height="200">
                                                                    <div
                                                                        class="m-list-timeline m-list-timeline--skin-light"
                                                                        id="notification">
                                                                        <div
                                                                            class="m-list-timeline__items notification">
                                                                            @if(count(auth()->user()->unreadNotifications) > 0)
                                                                                @foreach(auth()->user()->unreadNotifications as $notification)
                                                                                    <div class="m-list-timeline__item">
                                                                                <span
                                                                                    class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>

                                                                                        <a href="{{ $notification->data['url_en'] === '#' ? '#' : url($notification->data['url_'.app()->getLocale()].'?read='.$notification->id)}}"
                                                                                           class="m-list-timeline__text">
                                                                                            {{$notification->data['message_'.app()->getLocale()]}}
                                                                                            <span warning
                                                                                                  class="m-badge m-badge--{{ $notification->data['url_en'] === '#' ? 'warning' : 'success'}} m-badge--wide">
                                                                                                    @if($notification->data['url_en'] === '#')
                                                                                                    @lang('course.ByAdmin')
                                                                                                @else
                                                                                                    @lang('course.new')
                                                                                                @endif
																						</span>
                                                                                        </a>

                                                                                        <span
                                                                                            class="m-list-timeline__time">
																						{{Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}
																					</span>
                                                                                    </div>
                                                                                @endforeach
                                                                            @else
                                                                                <div class="m-list-timeline__item">
                                                                                <span
                                                                                    class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                                                                    <span
                                                                                        class="m-list-timeline__text">
                                                                                      @lang('course.not_notification')

                                                                                    </span>
                                                                                </div>

                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="topbar_notifications_events"
                                                                 role="tabpanel">
                                                                <div class="m-scrollable"
                                                                     m-scrollabledata-scrollable="true"
                                                                     data-max-height="250" data-mobile-max-height="200">
                                                                    <div
                                                                        class="m-list-timeline m-list-timeline--skin-light">
                                                                        <div class="m-list-timeline__items">
                                                                            <div class="m-list-timeline__item">
                                                                                <span
                                                                                    class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                                                                <a href=""
                                                                                   class="m-list-timeline__text">
                                                                                    New order received
                                                                                </a>
                                                                                <span class="m-list-timeline__time">
																						Just now
																					</span>
                                                                            </div>
                                                                            <div class="m-list-timeline__item">
                                                                                <span
                                                                                    class="m-list-timeline__badge m-list-timeline__badge--state1-danger"></span>
                                                                                <a href=""
                                                                                   class="m-list-timeline__text">
                                                                                    New invoice received
                                                                                </a>
                                                                                <span class="m-list-timeline__time">
																						20 mins
																					</span>
                                                                            </div>
                                                                            <div class="m-list-timeline__item">
                                                                                <span
                                                                                    class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                                                                <a href=""
                                                                                   class="m-list-timeline__text">
                                                                                    Production server up
                                                                                </a>
                                                                                <span class="m-list-timeline__time">
																						5 hrs
																					</span>
                                                                            </div>
                                                                            <div class="m-list-timeline__item">
                                                                                <span
                                                                                    class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                                                <a href=""
                                                                                   class="m-list-timeline__text">
                                                                                    New order received
                                                                                </a>
                                                                                <span class="m-list-timeline__time">
																						7 hrs
																					</span>
                                                                            </div>
                                                                            <div class="m-list-timeline__item">
                                                                                <span
                                                                                    class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                                                <a href=""
                                                                                   class="m-list-timeline__text">
                                                                                    System shutdown
                                                                                </a>
                                                                                <span class="m-list-timeline__time">
																						11 mins
																					</span>
                                                                            </div>
                                                                            <div class="m-list-timeline__item">
                                                                                <span
                                                                                    class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                                                <a href=""
                                                                                   class="m-list-timeline__text">
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
                                                                    <div
                                                                        class="m-stack__item m-stack__item--center m-stack__item--middle">
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
                                            <span
                                                class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
                                            <span class="m-nav__link-icon">
													<i class="flaticon-share"></i>
												</span>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span
                                                class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__body m-dropdown__body--paddingless">
                                                    <div class="m-dropdown__content">
                                                        <div class="m-scrollable" data-scrollable="false"
                                                             data-max-height="380" data-mobile-max-height="200">
                                                            <div class="m-nav-grid m-nav-grid--skin-light">
                                                                <div class="m-nav-grid__row">
                                                                    <a href="{{route('course_lecture.index')}}"
                                                                       class="m-nav-grid__item">
                                                                        <i class="m-nav-grid__icon flaticon-folder"></i>
                                                                        <span class="m-nav-grid__text">
																													@lang('course.course_management')

																			</span>
                                                                    </a>
                                                                    <a href="{{route('index')}}"
                                                                       class="m-nav-grid__item">
                                                                        <i class="m-nav-grid__icon flaticon-clipboard"></i>
                                                                        <span class="m-nav-grid__text">
																			@lang('course.certificate')
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
													<img
                                                        src="{{isset(auth()->user()->image->file_path) ? url('storage/'.auth()->user()->image->file_path) : 'https://ssl.gstatic.com/accounts/ui/avatar_2x.png' }}"
                                                        class="m--img-rounded m--marginless m--img-centered"
                                                        alt="{{auth()->user()->full_name()}}"/>
												</span>
                                            <span class="m-topbar__username m--hide">
													{{auth()->user()->full_name()}}
												</span>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span
                                                class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__header m--align-center"
                                                     style="background: url(assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
                                                    <div class="m-card-user m-card-user--skin-dark">
                                                        <div class="m-card-user__pic">
                                                            <img
                                                                src="{{isset(auth()->user()->image->file_path) ? url('storage/'.auth()->user()->image->file_path) : 'https://ssl.gstatic.com/accounts/ui/avatar_2x.png'}}"
                                                                class="m--img-rounded m--marginless" alt=""/>
                                                        </div>
                                                        <div class="m-card-user__details">
																<span class="m-card-user__email m--font-weight-500">
																	{{auth()->user()->full_name()}}

																</span>
                                                            <br>
                                                            <a href=""
                                                               class="m-card-user__email m--font-weight-300 m-link">
                                                                {{auth()->user()->email}}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav m-nav--skin-light">
                                                            <li class="m-nav__section m--hide">
																	<span class="m-nav__section-text">
																		{{auth()->user()->full_name()}}
																	</span>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="{{route('user.setting')}}" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                                    <span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">
																					@lang('course.MyProfile')
																				</span>
																				<span class="m-nav__link-badge">
{{--																					<span--}}
                                                                                    {{--                                                                                        class="m-badge m-badge--success">--}}
                                                                                    {{--																						2--}}
                                                                                    {{--																					</span>--}}
																				</span>
																			</span>
																		</span>
                                                                </a>
                                                            </li>

                                                            <li class="m-nav__separator m-nav__separator--fit"></li>

                                                            <li class="m-nav__item">
                                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"
                                                                   class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                                    @lang('auth.logout')
                                                                </a>
                                                                <form id="logout-form" action="{{ route('logout') }}"
                                                                      method="POST" style="display: none;">
                                                                    @csrf
                                                                </form>
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
                                            <span
                                                class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav m-nav--skin-light">

                                                            <li class="m-nav__item">
                                                                <a href="{{url('login')}}"
                                                                   class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                                    @lang('admin.login')
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
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


        </div>
    </div>
    <!-- end:: Body -->
    <!-- begin::Footer -->
{{--    <footer class="m-grid__item		m-footer ">
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
    </footer>--}}
<!-- end::Footer -->
</div>
<!-- end:: Page -->


<!-- begin::Scroll Top -->


<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500"
     data-scroll-speed="300">
    <i class="la la-arrow-up"></i>
</div>


<!-- end::Scroll Top -->            <!-- begin::Quick Nav -->
{{--<ul class="m-nav-sticky" style="margin-top: 30px;">

    --}}{{--
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
</ul>--}}
<!-- begin::Quick Nav -->
<!--begin::Base Scripts -->
<script src="{{asset('course_assets/vendors/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('course_assets/js/scripts.bundle.js')}}" type="text/javascript"></script>
<!--end::Base Scripts -->
<!--begin::Page Snippets -->
<script src="{{asset('course_assets/js/dashboard.js')}}" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('sweetalert/2.1.0/sweetalert.min.js') }}"></script>
<script src="{{ asset('social.js') }}"></script>

{{--<script src="{{ asset('/brisk-selectOptions/js/brisk-selectOptions.js') }}"></script>
<script src="{{ asset('/brisk-form/js/brisk-form.js') }}"></script>
<script src="{{ asset('/brisk-datatable/js/brisk-datatable.js') }}"></script>--}}



{{--        <script src="{{asset('js/app.js')}}"></script>--}}
<script src="{{ asset('resources/assets/js/globals.js') }}"></script>
<script src="{{ asset('resources/assets/js/lists.js') }}"></script>
<script src="{{ asset('resources/assets/js/notifications.js') }}"></script>
<script src="{{ asset('resources/assets/js/http.js') }}"></script>
<script src="{{ asset('resources/assets/js/editable.js') }}"></script>
@stack('js')
<!--end::Page Snippets -->


<!-- ** Don't forget to Add jQuery here ** -->
<script src="{{asset('plugins/lib/')}}/js/config.js"></script>
<script src="{{asset('plugins/lib/')}}/js/util.js"></script>
<script src="{{asset('plugins/lib/')}}/js/jquery.emojiarea.js"></script>
<script src="{{asset('plugins/lib/')}}/js/emoji-picker.js"></script>
<script>

</script>
</body>
<!-- end::Body -->
</html>
