<div class="actions">
    <div class="btn-group">
        <a class="btn btn-default btn-outlines btn-circle" href="javascript:;" data-toggle="dropdown"
           data-hover="dropdown" data-close-others="true" aria-expanded="false">
            <i class="fa fa-wrench"></i>
            {{ trans('admin.actions') }}
            <i class="fa fa-angle-down"></i>
        </a>
        <ul class="dropdown-menu pull-right">
            <li>
                <a href="#" data-link="{{ route('course_lecture.show',$id)}}"  data-action="show"><i
                            class="fa fa-eye"></i> {{trans('admin.show')}}</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="{{ route('course_lecture.show',$id)}}"><i
                            class="fa fa-pencil-square-o"></i> {{trans('admin.edit')}}</a>
            </li>
            <li class="divider"></li>

            <li>
                <a data-toggle="modal" data-target="#delete_record{{$id}}" href="#">
                    <i class="fa fa-trash"></i> {{trans('admin.delete')}}</a>
            </li>
        </ul>
    </div>
</div>
<div class="modal fade" id="delete_record{{$id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
            </div>
            <div class="modal-body">
                <i class="fa fa-exclamation-triangle"></i> {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$id}}) ؟
            </div>
            <div class="modal-footer">
                <form method="post" action="{{route('course_lecture.show', $id)}}">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="{{trans('admin.approval')}}">
                </form>
                <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
            </div>
        </div>
    </div>
</div>
