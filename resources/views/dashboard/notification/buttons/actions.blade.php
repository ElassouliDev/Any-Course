
		<div class="actions">
				<div class="btn-group">
						<a class="btn btn-default btn-outlines btn-circle" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
								<i class="fa fa-wrench"></i>
						{{ trans('admin.actions') }}
								<i class="fa fa-angle-down"></i>
						</a>

						<ul class="dropdown-menu pull-right">
                            @if($read_at === null)
								<li>
										<a href="{{ route('dashboard.notifications.edit',$id)}}"><i class="fa fa-pencil-square-o"></i> {{trans('admin.reading')}}</a>
								</li>
                            @else
                                <li>
                                    <a href="#"><i class="fa fa-check-circle"></i> @lang('admin.it_is_read')</a>
                                </li>
                            @endif
                                <li class="divider"> </li>
                                <li>
                                    <a href="{{url($data['url_'.app()->getLocale()].'?read='.$id)}}"><i class="fa fa-eye"></i> @lang('admin.read')</a>
                                </li>
						</ul>

				</div>
		</div>
