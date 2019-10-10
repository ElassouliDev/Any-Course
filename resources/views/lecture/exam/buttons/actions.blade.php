<div class="actions">
    <div class="btn-group">
        <a class="btn btn-default btn-outlines btn-circle" href="javascript:;" data-toggle="dropdown"
           data-hover="dropdown" data-close-others="true" aria-expanded="false">
            <i class="fa fa-wrench"></i>
            {{ trans('admin.actions') }}
            <i class="fa fa-angle-down"></i>
        </a>
        <ul class="dropdown-menu pull-right">

            <li class="divider"></li>
            <li>
                <a data-action="show" data-link="{{route('exam.show',['exam_id'=>$id,'course_id'=>$course_id])}}"><i
                             class="fa fa-eye"></i> {{trans('admin.show')}}</a>
            </li>
            <li class="divider"></li>
            <li>
                <a data-action="show" data-link="{{ route('exam.edit',[$course_id,$id])}}"><i
                            class="fa fa-pencil-square-o"></i> {{trans('admin.edit')}}</a>
            </li>
            <li class="divider"></li>

            <li>
                <a  href="#" data-action='delete-action' >
                    <i class="fa fa-trash" ></i>
                    {{trans('admin.delete')}}
                    <form class="hidden" method="post" data-action="delete" action="{{route('exam.destroy', [$course_id,$id])}}">
                        @csrf
                        @method('delete')
                    </form>
                </a>
            </li>
        </ul>
    </div>
</div>
{{--
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
                <form method="post" data-action="delete" action="{{route('exam.destroy', ['exam_id'=>$id,'course_id'=>$course_id])}}">
                    @csrf
                    @method('delete')
                </form>
                <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
            </div>
        </div>
    </div>
</div>
--}}
