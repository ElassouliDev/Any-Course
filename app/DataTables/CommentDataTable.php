<?php

namespace App\DataTables;

use App\Comment;
use App\User;
use Yajra\DataTables\Services\DataTable;


class CommentDataTable extends DataTable
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
//            ->editColumn('lesson_id', function($row){
//                return $row->course['title_'.app()->getLocale()];
//    })
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
        return Comment::query()->orderBy('id','desc');

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
                'buttons' => [
//                    ['extend' => 'print', 'className' => 'btn bg-dark btn-outline', 'text' => '<i class="fa fa-print"></i> ' . trans('datatables.print')],
//                    ['extend' => 'excel', 'className' => 'btn bg-green btn-outline', 'text' => '<i class="fa fa-file-excel-o"> </i> ' . trans('datatables.export_excel')],
//                    /*['extend' => 'pdf', 'className' => 'btn red btn-outline', 'text' => '<i class="fa fa-file-pdf-o"> </i> '.trans('datatables.export_pdf')],*/
//                    ['extend' => 'csv', 'className' => 'btn bg-purple btn-outline', 'text' => '<i class="fa fa-file-excel-o"> </i> ' . trans('datatables.export_csv')],
//                    ['extend' => 'reload', 'className' => 'btn bg-blue btn-outline', 'text' => '<i class="fa fa fa-refresh"></i> ' . trans('datatables.reload')],
//                    [
//                        'text' => '<i class="fa fa-trash"></i> ' . trans('datatables.delete'),
//                        'className' => 'btn bg-red btn-outline deleteBtn',
//                    ],
                    [
                        'text' => '<i class="fa fa-plus"></i> ' . trans('datatables.add'),
                        'className' => 'btn btn-primary',
                        'action' => 'function(){
                        	window.location.href =  "' . \URL::current() . '/create";
                        }',
                    ],
                ],
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
                'name'=>'commentable_type',
                'data'=>'commentable_type',
                'title'=>trans('admin.type'),
            ],
  [
                'name'=>'content',
                'data'=>'content',
                'title'=>trans('admin.content'),
            ],
//            [
//                'name' => 'actions',
//                'data' => 'actions',
//                'title' => trans('admin.actions'),
//                'exportable' => false,
//                'printable'  => false,
//                'searchable' => false,
//                'orderable'  => false,
//            ]


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
