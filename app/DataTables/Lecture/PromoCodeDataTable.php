<?php

namespace App\DataTables\Lecture;

use App\Course;
use App\User;
use Gabievi\Promocodes\Facades\Promocodes;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Services\DataTable;


class PromoCodeDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */

    protected $count=0;

    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('Promocode', function ($row) {
                return $row->code;
            })->addColumn('description', function ($row) {
                return $row->data['description'];
            })->addColumn('description', function ($row) {
                return $row->data['description'];
            })->addColumn('amount', function ($row) {
                return $row->data['amount'] ?? '-';
            })->addColumn('numbers', function ($row) {
                return $this->count--;
            })
            ->rawColumns(['actions']);

    }

    public function query()
    {
        $promocodes = Promocodes::all()->where('data.lecture_id',auth()->id());
        $this->count =$promocodes->count();
        return $promocodes;

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
                "bFilter" => false,
                "bLengthChange" => false,
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
                'order' => [[0, 'asc']],

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
                'name' => 'numbers',
                'data' => 'numbers',
                'title' => trans('admin.numbers'),
            ], [
                'name' => 'Promocode',
                'data' => 'Promocode',
                'title' => trans('admin.promocode'),
            ],
            [
                'name' => 'amount',
                'data' => 'amount',
                'title' => trans('admin.amount'),
            ],
            [
                'name' => 'description',
                'data' => 'description',
                'title' => trans('admin.description'),
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
