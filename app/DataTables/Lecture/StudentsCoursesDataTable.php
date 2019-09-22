<?php

namespace App\DataTables\Lecture;

use App\Course;
use App\User;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Services\DataTable;


class StudentsCoursesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */


    public function dataTable($query)
    {
        return datatables($query)
            ->editColumn('image', function ($row){
                return isset($row->image->file_path)?
                    '<img src="'.url('/storage/'.$row->image->file_path).'" class="img-fluid" width="45px" height="45px" style="border-radius: 50%">':
                    '<img src="'.url('https://ssl.gstatic.com/accounts/ui/avatar_2x.png').'" class="img-fluid" width="45px" height="45px" style="border-radius: 50%">';

            })

            ->rawColumns(['image','actions']);

    }

    public function query()
    {
        return User::with('image')->whereHas('enrolled_course',function ($q){
            return $q->where('courses.user_id',auth()->id());
        });
        /*Course::query()->where('user_id',auth()->id())->with(['students' => function ($q) {
            $q->with('image');
        }])->get())->map(function ($d){
            return $d->students;
        });*/

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $html = $this->builder()
            ->columns($this->getColumns())
            ->ajax('')
            ->parameters([
                'dom' => 'Blfrtip',
                "lengthMenu" => [[10, 25, 50, 100, -1], [10, 25, 50, 100, trans('datatables.all_records')]],
                "bFilter"=> false,
                "bLengthChange"=> false,
                'initComplete' => "function () {
                this.api().columns([3]).every(function () {
                var column = this;
                var input = document.createElement(\"input\");
                $(input).attr( 'style', 'width: 100%');
                $(input).attr( 'class', 'form-control');
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });
            }",
                'order' => [[1, 'desc']],

                'language' => [
                    'sProcessing' => trans('datatables.sProcessing'),
                    'sLengthMenu' => trans('datatables.sLengthMenu'),
                    'sZeroRecords' => trans('datatables.sZeroRecords'),
                    'sEmptyTable' => trans('datatables.sEmptyTable'),
                    'sInfo' => trans('datatables.sInfo'),
                    'sInfoEmpty' => trans('datatables.sInfoEmpty'),
                    'sInfoFiltered' => trans('datatables.sInfoFiltered'),
                    'sInfoPostFix' => trans('datatables.sInfoPostFix'),
                    'sSearch' => trans('datatables.sSearch'),
                    'sUrl' => trans('datatables.sUrl'),
                    'sInfoThousands' => trans('datatables.sInfoThousands'),
                    'sLoadingRecords' => trans('datatables.sLoadingRecords'),
                    'oPaginate' => [
                        'sFirst' => trans('datatables.sFirst'),
                        'sLast' => trans('datatables.sLast'),
                        'sNext' => trans('datatables.sNext'),
                        'sPrevious' => trans('datatables.sPrevious'),
                    ],
                    'oAria' => [
                        'sSortAscending' => trans('datatables.sSortAscending'),
                        'sSortDescending' => trans('datatables.sSortDescending'),
                    ],
                ]
            ]);

        return $html;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [


            [
                'name' => 'image',
                'data' => 'image',
                'title' => '',
                'orderable'=>false

                ],




            [
                'name' => 'first_name',
                'data' => 'first_name',
                'title' => trans('admin.first_name'),
            ],
            [
                'name' => 'last_name',
                'data' => 'last_name',
                'title' => trans('admin.last_name'),
            ],
            [
                'name' => 'email',
                'data' => 'email',
                'title' => trans('admin.email'),
            ],



        ];

    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'course_' . date('YmdHis');
    }
}
