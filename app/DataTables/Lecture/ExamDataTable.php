<?php

namespace App\DataTables\lecture;

use App\Exam;
use App\Course;
use Yajra\DataTables\Services\DataTable;


class ExamDataTable extends DataTable
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
            ->addColumn('actions', 'lecture.exam.buttons.actions')
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
        $id = Course::where('slug_en',$this->slug)->orWhere('slug_en',$this->slug)->first()->id;
        return Exam::where('course_id',$id)->with('course')->orderBy('id','desc');

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
                "lengthMenu" => [[10, 25, 50,100, -1], [10, 25, 50,100, trans('datatables.all_records')]],
                "bFilter"=> false,
                "bLengthChange"=> false,
                'initComplete' => "function () {
                this.api().columns([0]).every(function () {
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
                    'sLengthMenu'        => trans('datatables.sLengthMenu'),
                    'sZeroRecords'       => trans('datatables.sZeroRecords'),
                    'sEmptyTable'        => trans('datatables.sEmptyTable'),
                    'sInfo'              => trans('datatables.sInfo'),
                    'sInfoEmpty'         => trans('datatables.sInfoEmpty'),
                    'sInfoFiltered'      => trans('datatables.sInfoFiltered'),
                    'sInfoPostFix'       => trans('datatables.sInfoPostFix'),
                    'sSearch'            => trans('datatables.sSearch'),
                    'sUrl'               => trans('datatables.sUrl'),
                    'sInfoThousands'     => trans('datatables.sInfoThousands'),
                    'sLoadingRecords'    => trans('datatables.sLoadingRecords'),
                    'oPaginate'          => [
                        'sFirst'            => trans('datatables.sFirst'),
                        'sLast'             => trans('datatables.sLast'),
                        'sNext'             => trans('datatables.sNext'),
                        'sPrevious'         => trans('datatables.sPrevious'),
                    ],
                    'oAria'            => [
                        'sSortAscending'  => trans('datatables.sSortAscending'),
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
                'name'=>'title',
                'data'=>'title_'.app()->getLocale(),
                'title'=>trans('admin.title'),
            ],
            [
                'name'=>'course_id',
                'data'=>'course.title_'.app()->getLocale(),
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
        return 'Exam_' . date('YmdHis');
    }
}
