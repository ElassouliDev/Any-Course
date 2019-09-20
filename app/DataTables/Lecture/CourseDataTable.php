<?php

namespace App\DataTables\Lecture;

use App\Course;
use App\User;
use Yajra\DataTables\Services\DataTable;


class CourseDataTable extends DataTable
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
            ->addColumn('actions', 'lecture.course.buttons.actions')
            ->editColumn('image', function ($row){
                return '<img src="'.url('/storage/'.$row->image->file_path).'" class="img-fluid" width="45px" height="45px" style="border-radius: 50%">';


            })
            ->editColumn('category_id', function($row){
                return $row->category['title_'.app()->getLocale()];
            })     ->editColumn('is_paid', function($row){
                if ($row->is_paid===0){

                    return trans('admin.free');
                }else{

                    return trans('admin.paid');
                }
            })->editColumn('price', function($row){
                return "$".$row->price;
            })
            ->rawColumns(['actions','image']);
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
        return Course::query()->where('user_id',auth()->id())->orderBy('id','desc');

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
            ->parameters([
                'dom' => 'Blfrtip',
                "bFilter"=> false,
                "bLengthChange"=> false,
                "lengthMenu" => [[10, 25, 50,100, -1], [10, 25, 50,100, trans('datatables.all_records')]],

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
                'name'=>'image',
                'data'=>'image',
                'title'=>trans('admin.image'),
            ],
            [
                'name'=>'title_'.app()->getLocale(),
                'data'=>'title_'.app()->getLocale(),
                'title'=>trans('admin.title'),
            ],

            [
                'name'=>'status',
                'data'=>'status',
                'title'=>trans('admin.status'),
            ],
            [
                'name'=>'is_paid',
                'data'=>'is_paid',
                'title'=>trans('admin.is_paid'),
            ],
            [
                'name'=>'category_id',
                'data'=>'category_id',
                'title'=>trans('admin.category'),
            ],
            [
                'name'=>'price',
                'data'=>'price',
                'title'=>trans('admin.price'),
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
        return 'course_' . date('YmdHis');
    }
}
