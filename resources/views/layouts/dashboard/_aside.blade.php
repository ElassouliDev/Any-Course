<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dashboard_files/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->first_name .' '.auth()->user()->last_name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="{{ url('dashboard') }}"><i class="fa fa-th"></i><span>@lang('admin.dashboard')</span></a></li>

            @if (auth()->user()->hasPermission('read_categories'))
                <li><a href="{{ route('dashboard.category.index') }}"><i class="fa fa-th-list"></i><span>@lang('admin.categories')</span></a></li>
            @endif
                        @if (auth()->user()->hasPermission('read_courses'))
                <li><a href="{{ route('dashboard.course.index') }}"><i class="fa fa-list-alt"></i><span>@lang('admin.courses')</span></a></li>
            @endif

                        @if (auth()->user()->hasPermission('read_lessons'))
                <li><a href="{{ route('dashboard.lesson.index') }}"><i class="fa fa-list-ol"></i><span>@lang('admin.lessons')</span></a></li>
            @endif
                        @if (auth()->user()->hasPermission('read_questions'))
                <li><a href="{{ route('dashboard.question.index') }}"><i class="fa  fa-question-circle-o"></i><span>@lang('admin.questions')</span></a></li>
            @endif
                        @if (auth()->user()->hasPermission('read_comments'))
                <li><a href="{{ route('dashboard.comment.index') }}"><i class="fa  fa-question-circle-o"></i><span>@lang('admin.comments')</span></a></li>
            @endif
                        @if (auth()->user()->hasPermission('read_questions'))
                <li><a href="{{ route('dashboard.exam.index') }}"><i class="fa   fa-exclamation-triangle"></i><span>@lang('admin.exams')</span></a></li>
            @endif

                        @if (auth()->user()->hasPermission('read_tags'))
                <li><a href="{{ route('dashboard.tag.index') }}"><i class="fa fa-tag"></i><span>@lang('admin.tags')</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('read_settings'))
                <li><a href="{{ route('dashboard.settings.index') }}"><i class="fa fa-opencart"></i><span>@lang('admin.settings')</span></a></li>
            @endif


            @if (auth()->user()->hasPermission('read_users'))
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>@lang('admin.users')</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('dashboard.users.index',['users'=>'admin']) }}"><i class="fa fa-user"></i><span>@lang('admin.admins')</span></a></li>
                        <li><a href="{{ route('dashboard.users.index',['users'=>'student']) }}"><i class="fa fa-user"></i><span>@lang('admin.students')</span></a></li>
                        <li><a href="{{ route('dashboard.users.index',['users'=>'lecture']) }}"><i class="fa fa-user"></i><span>@lang('admin.lectures')</span></a></li>
                    </ul>
                </li>
            @endif

            {{--<li><a href="{{ route('dashboard.categories.index') }}"><i class="fa fa-book"></i><span>@lang('admin.categories')</span></a></li>--}}
            {{----}}
            {{----}}
            {{--<li><a href="{{ route('dashboard.users.index') }}"><i class="fa fa-users"></i><span>@lang('admin.users')</span></a></li>--}}

            {{--<li class="treeview">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-pie-chart"></i>--}}
            {{--<span>الخرائط</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li>--}}
            {{--<a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
        </ul>

    </section>

</aside>

