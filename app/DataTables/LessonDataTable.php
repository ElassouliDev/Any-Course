<?php

namespace App\DataTables;

use App\Lesson;
use App\User;
use Yajra\DataTables\Services\DataTable;


class LessonDataTable extends DataTable
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
            ->addColumn('actions', 'dashboard.lesson.buttons.actions')
            ->editColumn('course_id', function($row){
                return $row->course['title_'.app()->getLocale()];
    })
            ->rawColumns(['actions']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
//        return $model->newQuery()->select('id', 'add-your-columns-here', 'created_at', 'updated_at');
        return Lesson::query()->orderBy('id','desc');

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $html =  $this->builder()
            ->columns($this->getColumns())
            ->ajax('')
            ->parameters([
                'dom' => 'Blfrtip',
                "lengthMenu" => [[10, 25, 50,100, -1], [10, 25, 50,100, trans('datatable.all_records')]],
                'buttons' => [
                    ['extend' => 'print', 'className' => 'btn dark btn-outline', 'text' => '<i class="fa fa-print"></i> '.trans('datatable.print')],
                    ['extend' => 'excel', 'className' => 'btn green btn-outline', 'text' => '<i class="fa fa-file-excel-o"> </i> '.trans('datatable.export_excel')],
                    /*['extend' => 'pdf', 'className' => 'btn red btn-outline', 'text' => '<i class="fa fa-file-pdf-o"> </i> '.trans('datatable.export_pdf')],*/
                    ['extend' => 'csv', 'className' => 'btn purple btn-outline', 'text' => '<i class="fa fa-file-excel-o"> </i> '.trans('datatable.export_csv')],
                    ['extend' => 'reload', 'className' => 'btn blue btn-outline', 'text' => '<i class="fa fa fa-refresh"></i> '.trans('datatable.reload')],
                    [
                        'text' => '<i class="fa fa-trash"></i> '.trans('datatable.delete'),
                        'className'    => 'btn red btn-outline deleteBtn',
                    ], [
                        'text' => '<i class="fa fa-plus"></i> '.trans('datatable.add'),
                        'className'    => 'btn btn-primary',
                        'action'    => 'function(){
                        	window.location.href =  "'.\URL::current().'/create";
                        }',
                    ],
                ],
                'initComplete' => "function () {
                this.api().columns([1,2]).every(function () {
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
                    'sProcessing' => trans('datatable.sProcessing'),
                    'sLengthMenu'        => trans('datatable.sLengthMenu'),
                    'sZeroRecords'       => trans('datatable.sZeroRecords'),
                    'sEmptyTable'        => trans('datatable.sEmptyTable'),
                    'sInfo'              => trans('datatable.sInfo'),
                    'sInfoEmpty'         => trans('datatable.sInfoEmpty'),
                    'sInfoFiltered'      => trans('datatable.sInfoFiltered'),
                    'sInfoPostFix'       => trans('datatable.sInfoPostFix'),
                    'sSearch'            => trans('datatable.sSearch'),
                    'sUrl'               => trans('datatable.sUrl'),
                    'sInfoThousands'     => trans('datatable.sInfoThousands'),
                    'sLoadingRecords'    => trans('datatable.sLoadingRecords'),
                    'oPaginate'          => [
                        'sFirst'            => trans('datatable.sFirst'),
                        'sLast'             => trans('datatable.sLast'),
                        'sNext'             => trans('datatable.sNext'),
                        'sPrevious'         => trans('datatable.sPrevious'),
                    ],
                    'oAria'            => [
                        'sSortAscending'  => trans('datatable.sSortAscending'),
                        'sSortDescending' => trans('datatable.sSortDescending'),
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
                'name'=>'title_ar',
                'data'=>'title_'.app()->getLocale(),
                'title'=>trans('admin.title_'.app()->getLocale()),
            ],
           [
                'name'=>'description_ar',
                'data'=>'description_'.app()->getLocale(),
                'title'=>trans('admin.description_'.app()->getLocale()),
            ],  [
                'name'=>'course_id',
                'data'=>'course_id',
                'title'=>trans('admin.course'),
            ],
            [
                'name' => 'actions',
                'data' => 'actions',
                'title' => trans('admin.actions'),
                'exportable' => false,
                'printable'  => false,
                'searchable' => false,
                'orderable'  => false,
            ]


        ];

    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Lesson_' . date('YmdHis');
    }
}
