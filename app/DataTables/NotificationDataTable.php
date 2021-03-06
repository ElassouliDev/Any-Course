<?php

namespace App\DataTables;

use App\Lesson;
use App\User;
use Yajra\DataTables\Services\DataTable;


class NotificationDataTable extends DataTable
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
            ->addColumn('actions', 'dashboard.notification.buttons.actions')
            ->editColumn('data', function ($row) {
                return $row->data['message_'.app()->getLocale()];
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
        return auth()->user()->Notifications;

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
                'buttons' => [
//                    ['extend' => 'print', 'className' => 'btn bg-dark btn-outline', 'text' => '<i class="fa fa-print"></i> ' . trans('datatables.print')],
//                    ['extend' => 'excel', 'className' => 'btn bg-green btn-outline', 'text' => '<i class="fa fa-file-excel-o"> </i> ' . trans('datatables.export_excel')],
//                    /*['extend' => 'pdf', 'className' => 'btn red btn-outline', 'text' => '<i class="fa fa-file-pdf-o"> </i> '.trans('datatables.export_pdf')],*/
//                    ['extend' => 'csv', 'className' => 'btn bg-purple btn-outline', 'text' => '<i class="fa fa-file-excel-o"> </i> ' . trans('datatables.export_csv')],
//                    ['extend' => 'reload', 'className' => 'btn bg-blue btn-outline', 'text' => '<i class="fa fa fa-refresh"></i> ' . trans('datatables.reload')],
//
                    [
                        'text' => '<i class="fa fa-plus"></i> ' . trans('datatables.add'),
                        'className' => 'btn btn-primary',
                        'action' => 'function(){
                        	window.location.href =  "' . route('dashboard.notifications.create')  .'";
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
                'name' => 'data',
                'data' => 'data',
                'title' => trans('admin.message'),
            ],

            [
                'name' => 'actions',
                'data' => 'actions',
                'title' => trans('admin.actions'),
                'exportable' => false,
                'printable' => false,
                'searchable' => false,
                'orderable' => false,
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
        return 'Notification_' . date('YmdHis');
    }
}
